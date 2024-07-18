<div class="categories-wrapper">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="category-create-form" method="POST" action="{{ route('category.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Название категории...">
        <button class="btn" type="submit">
            Создать
        </button>
    </form>
    @if(!empty($categories))
        <div class="categories">
            <h2>Категории задач</h2>
            <a href="{{ route('home') }}" class="category @if(request()->route()->getName() == 'home') active @endif ">
                Все
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('category.show', $category->id)}}" class="category @if(request()->route()->getName() == 'category.show' && request()->route('id') == $category->id) active @endif"">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    @endif
</div>