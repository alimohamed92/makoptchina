var ValidatorRules = function () {
	this.tel = function (value) {
		return (/\+33[0-9]{9}/.test(value.val()) && value.val().length == 12) ||(/[0-9]{8}/.test(value.val()) && value.val().length >= 8 && value.val().length <= 14);
	};

	this.text = this.notEmpty = function (value) {
		return value.val().length != 0 &&
		       value.val().replace(" ", '').length != 0;
	};

	this.email = function (value) {
		return /(.+)@(.+)\.(.+)/.test(value.val());
	};

	this.date = function (value) {
		return /[0-9]{4}-[0-9]{2}-([0-2][0-9]|(3)[0-1])/.test(value.val()) && value.val().length == 10;
	};

	this.checked = function (target) {
		return target.prop("checked");
	};

	this.either = function (t1, t2, fun) {
		return fun(t1) || fun(t2);
	};
	this.isNot = function (target, value) {
		return target.val() != value;
	};
	this.AjaxEmail = function (value) {
		return $.ajax(ajax_email + value.val()).done(function (data) {
			return data.exists == false;
		});
	};

	this.AjaxNumeroEtudiant = function (value) {
		return $.ajax(ajax_numetud + value.val()).done(function (data) {
			return data.exists == false;
		});
	}

	this.password = function (value) {
		if (value.val().length < 8)
			return false;

		return true;
	};

	this.select = function(input) {
		return input.val() ? true : false;
	}

	this.dateStringsFollow = function (first, next) {
		var first_split = first.val().split("-");
		var second_split = next.val().split("-");

		return parseInt(second_split[2]) > parseInt(first_split[2]) ||
		       parseInt(second_split[2]) == parseInt(first_split[2]) && parseInt(second_split[1]) > parseInt(first_split[1]) ||
		       parseInt(second_split[2]) == parseInt(first_split[2]) && parseInt(second_split[1]) == parseInt(first_split[1]) && parseInt(second_split[0]) > parseInt(first_split[0])
	};

	this.number =function (value){
		return !isNaN(value.val()) && (Number(value.val()) >= 0) && (Number(value.val()) <= 20) && this.notEmpty(value);
	}

	this.year = function (value){
		return !isNaN(value.val()) && value.val() >= 1970;
	}
}

function isValidInput(type, value){
  var validator = new ValidatorRules();
  if(!type) {
	  return validator.notEmpty(value);
  }
  console.log(type); console.log(value);
  if(type.includes('select')){
	  type = 'select';
  }
  return validator[type](value);
}