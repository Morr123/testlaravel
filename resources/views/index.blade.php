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
			<div class="errors">
				<div v-for="errorsField in errors" class="alert alert-danger" role="alert">
					<span v-for="error in errorsField">@{{error}}</span>
				</div>
			</div>
			<form v-on:submit="submit">
			  <div class="form-group">
				<label>Номер телефона</label>
				<input v-model="form.phone" type="text" class="form-control" placeholder="Введите номер телефона">
			  </div>
			  <div class="form-group">
				<label>Имя</label>
				<input v-model="form.name" type="text" class="form-control" placeholder="Введите имя">
			  </div>
			  <div class="form-group">
				<label>Адрес</label>
				<input v-model="form.address" type="text" class="form-control" placeholder="Введите имя">
			  </div>
			  <div class="form-group">
				<label>Тариф</label>
				<select v-model="form.tariff_id" class="form-control" id="exampleFormControlSelect1">
				  <option v-for="tariff in tariffs" v-bind:value="tariff.id">@{{tariff.name}} - @{{tariff.cost}}руб.</option>
				</select>
			  </div>
			  <div v-if="form.tariff_id !== ''" class="form-group">
				<label>Выберите день</label>
				<select v-model="form.weekday" class="form-control" id="exampleFormControlSelect1">
					<option v-for="weekday in getWeekdays"  v-bind:value="weekday.id">@{{weekday.slug}}</option>
				</select>
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
