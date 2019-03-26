<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Заказ</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script>
			window.csrf = '{{ csrf_token() }}';
		</script>
	</head>
    <body>
        <div class="container" id="app">
			<h1>Заказ</h1>
			
			<div v-if="message" class="alert alert-success alert-dismissible fade show" role="alert">
			  @{{message}}
			  <button v-on:click="message = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			
			<form v-on:submit="submit">
			  <div class="form-group">
				<label>Номер телефона (Формат: 8xxxxxxxxxx)</label>
				<input v-on:focus="validateClear('phone')" :class="containsErorr('phone') && 'is-invalid'" v-model="form.phone" pattern="8[0-9]{10}" type="text" class="form-control" placeholder="Введите номер телефона">
				<p v-if="containsErorr('phone')" class="text-danger"><span v-for="error in errors['phone']">@{{error}}</span></p>
			  </div>
			  <div class="form-group">
				<label>Имя</label>
				<input v-on:focus="validateClear('name')" :class="containsErorr('name') && 'is-invalid'" v-model="form.name" type="text" class="form-control" placeholder="Введите имя">
				<p v-if="containsErorr('name')" class="text-danger"><span v-for="error in errors['name']">@{{error}}</span></p>
			  </div>
			  <div class="form-group">
				<label>Адрес</label>
				<input v-on:focus="validateClear('address')" :class="containsErorr('address') && 'is-invalid'" v-model="form.address" type="text" class="form-control" placeholder="Введите имя">
				<p v-if="containsErorr('address')" class="text-danger"><span v-for="error in errors['address']">@{{error}}</span></p>
			  </div>
			  <div class="form-group">
				<label>Тариф</label>
				<select v-on:focus="validateClear('tariff_id')" :class="containsErorr('tariff_id') && 'is-invalid'" v-model="form.tariff_id" class="form-control" id="exampleFormControlSelect1">
				  <option v-for="tariff in tariffs" v-bind:value="tariff.id">@{{tariff.name}} - @{{tariff.cost}}руб.</option>
				</select>
				<p v-if="containsErorr('tariff_id')" class="text-danger"><span v-for="error in errors['tariff_id']">@{{error}}</span>
			  </div>
			  <div v-if="form.tariff_id !== ''" class="form-group">
				<label>Выберите день</label>
				<select v-on:focus="validateClear('weekday')" :class="containsErorr('weekday') && 'is-invalid'" v-model="form.weekday" class="form-control" id="exampleFormControlSelect1">
					<option v-for="weekday in getWeekdays"  v-bind:value="weekday.id">@{{weekday.slug}}</option>
				</select>
				<p v-if="containsErorr('weekday')" class="text-danger"><span v-for="error in errors['weekday']">@{{error}}</span>
			  </div>
			  <button type="submit" class="btn btn-primary">Отправить</button>
			</form>
		</div>
    </body>
	<script
	  src="http://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="js/main.js"></script>
</html>
