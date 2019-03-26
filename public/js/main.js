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
			url: '/tariff/index',
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
				url: '/order/store',
				data: this.form,
				success: function(r){
					alert('Success');
				},
				error: function(r){
					self.errors = r.responseJSON.errors;
					//console.log(r);
					//alert('Ошибка');
				}
			});
		}
	}
})