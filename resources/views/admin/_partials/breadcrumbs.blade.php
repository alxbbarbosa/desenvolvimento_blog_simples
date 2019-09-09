<ol class="breadcrumb">
    <li><a class="breadcrumb-item" href="{{ route('home') }}"> Dashboard</a></li>
    @forelse ($breadcrumbs as $item)
        <li><a class="breadcrumb-item @if(isset($item['ativo'])) active @endif" href="{{ $item['rota'] }}">{{ $item['nome'] }}</a></li>
    @empty
    @endforelse
</ol>