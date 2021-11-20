@extends('app')

@section('content')
    <div class="profile">
        <div class="general">
            <div class="profile__general--name"><span @if($player->isDead())style="color: red"@endif>Имя: {{ $player->getName() }}</span></div>
            <div class="profile__general--class">Класс: {{ $player->getClassName() }}</div>
            <div class="profile__general--race">Раса: {{ $player->getRaceName() }}</div>
            <div class="profile__general--level">Уровень: {{ $player->getLevel() }}</div>
            <div class="profile__general--expirience">
                Опыт: {{ $player->getExpirience() }} / {{ $player->getMaxExpirience() }}
            </div>

            <div class="profile__general--health">
                Здоровье: {{ $player->getHealth() }} / {{ $player->getMaxHealth() }}
            </div>

            <div class="profile__general--stamina">Выносливость: {{ $player->getStamina() }} / {{ $player->getMaxStamina() }}</div>
            <div class="profile__general--mana">Мана: {{ $player->getMana() }} / {{ $player->getMaxMana() }}</div>
        </div>

        <div class="characteristics">
            <div class="profile__characteristics--strength">Сила:{{ $player->getStrength() }}</div>
            <div class="profile__characteristics--armor">Броня:{{ $player->getArmor() }}</div>
            <div class="profile__characteristics--agility">Ловкость:{{ $player->getAgility() }}</div>
            <div class="profile__characteristics--intelligence">Интеллект:{{ $player->getIntelligence() }}</div>
            <div class="profile__characteristics--endurance">Выносливость:{{ $player->getEndurance() }}</div>
            <div class="profile__characteristics--speed">Скорость:{{ $player->getSpeed() }}</div>
            <div class="profile__characteristics--luck">Удача:{{ $player->getluck() }}</div>
        </div>
    </div>
@endsection

