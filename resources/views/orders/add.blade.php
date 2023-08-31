<x-layout.main>

<main class="container vh-100">

    <h1 class="mt-5">Добавление заказа</h1>
    <div class="row mt-5 h-100">

        <div class="col-md">

            <form method="post" action="{{route('order.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">Адрес</label>
                    <input name="address" id="address" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <select name="time" class="form-select" aria-label="Default select example">
                        <option value="null" selected>Выберите время</option>
                        <option value="1">13:00</option>
                        <option value="2">17:00</option>
                        <option value="3">19:00</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>

</main>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/js/jquery.suggestions.min.js"></script>

    <script>
        $("#address").suggestions({
            token: "d3214ff2a7517702bb0f70fa0d28ac0edbd61592",
            type: "ADDRESS",
            /* Вызывается, когда пользователь выбирает одну из подсказок */
            onSelect: function(suggestion) {
                console.log(suggestion);
            }
        });
    </script>
</x-layout.main>
