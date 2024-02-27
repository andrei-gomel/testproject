@php
   /** @var  \App\Models\Client  $item */
@endphp
<div class="col-md-12">
	<div class="card">
		<div class="card-body">
			<div class="card-title"></div>
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
				</li>
			</ul>
			<br>
			<div class="tab-content">
				<div class="tab-pane active" id="maindata" role="tabpanel">
					<div class="form-group">
						<label for="first_name">Имя</label>
						<input name="first_name" value="{{ old('first_name', $item->first_name) }}"
						id="first_name"
						type="text"
						class="form-control"
						required>
					</div>

					<div class="form-group">
						<label for="last_name">Фамилия</label>
						<input name="last_name" value="{{ old('last_name', $item->last_name) }}"
						       id="last_name"
                               type="text"
                               class="form-control" required>

					</div>

                    <div class="form-group">
                        <label for="profession">Профессия</label>
                        <input name="profession" value="{{ old('profession', $item->profession) }}"
                               id="profession"
                               type="text"
                               class="form-control" required>
                    </div>

					<div class="form-group">
                        <label for="age">Возраст</label>
                        <input name="age" value="{{ old('age', $item->age) }}"
                               id="age"
                               type="text"
                               class="form-control" required>
					</div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>

				</div>
			</div>
		</div>
	</div>
</div>
