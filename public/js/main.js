var app = new Vue({
	el: '#app',
	data: {
		form: {
			phone: '',
			name: '',
			tariff_id: '',
			weekday: '',
			address: ''
		},
		tariffs: [],
		errors: [],
		message: false,
	},
	computed: {
		getWeekdays(){
			return this.tariffs.find(function(obj){
				return obj.id === this.form.tariff_id
			}.bind(this)).weekdays;
		}
	},
	mounted: function(){
		$.ajax({
			url: '/api/v1/tariff/index',
			success: function(r){
				this.tariffs = r.data;
			}.bind(this)
		})
	},
	methods: {
		submit: function(event){
			event.preventDefault();
			let self = this;
			$.ajax({
				headers: {
				  'X-CSRF-TOKEN': window.csrf
				},
				method: 'POST',
				url: '/api/v1/order/store',
				data: this.form,
				success: function(r){
					self.message = r.message;
				},
				error: function(r){
					self.errors = r.responseJSON.errors;
				}
			});
		},
		containsErorr: function(field){
			return field in this.errors;
		},
		validateClear: function(field){
			delete this.errors[field];
		}
	}
})