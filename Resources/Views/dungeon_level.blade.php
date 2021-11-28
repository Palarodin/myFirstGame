@extends('app')

@section('content')
    <p>Уровень данжа {{ $level }}</p>

    <div style="display: grid;
    grid-template-columns: repeat(2, 1fr);
    border-bottom: 1px solid #ccc;
    padding-bottom: 15px;
    margin-bottom: 15px;">
        <div>
            <p>{{ $player->getName() }}</p>
            <p>Здоровье: {{ $player->getHealth() }}</p>
        </div>
        <div>
            <p>{{ $enemy->getName() }}</p>
            <p>Здоровье: {{ $enemy->getHealth() }}</p>
        </div>
    </div>

    <h2>Журнал битвы</h2>
    {!! $battle->getLog() !!}
@endsection