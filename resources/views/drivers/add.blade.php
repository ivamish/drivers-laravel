<x-layout.main>

    <div class="container">
        <div class="row justify-content-md-center">
            <h1 class="text-center">Регистрация водителя</h1>
            <form method="post" action="{{route('user.store')}}" class="mt-5 col-md-5">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">Имя</label>
                    <input name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Фамилия</label>
                    <input name="last_name"  class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Отчество</label>
                    <input name="middle_name"  class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Почта</label>
                    <input name="email"  class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Телефон</label>
                    <input name="phone"  class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Зарегестрировать</button>
            </form>
        </div>
    </div>

</x-layout.main>
