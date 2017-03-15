@extends('layout')

@section('content')
    <div class="top-players-page container">
        <h1><?php echo trans('top.title'); ?></h1>
        <table>
            <thead>
            <tr>
                <td><?php echo trans('top.place'); ?></td>
                <td><?php echo trans('top.profile'); ?></td>
                <td><?php echo trans('top.participation'); ?></td>
                <td><?php echo trans('top.wins'); ?></td>
                <td><?php echo trans('top.win_rate'); ?></td>
                <td><?php echo trans('top.total'); ?></td>
            </tr>
            </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                <td><div class="player-place <?php if ($place == 1) { echo "first"; } elseif ($place === 2) { echo "second"; } elseif ($place == 3) { echo "third"; } else { echo ""; } ?> inline-block">{{ $place++ }}</div></td>
                <td class="player-info" width="100%">
                    <div class="player-avatar inline-block">
                        <a class="fancybox" href="#player-modal" data-profile="{{ $user->steamid64 }}" ><img src="{{ $user->avatar }}" alt=""></a>
                    </div>
                    <div class="player-name inline-block">
                        <a class="fancybox" href="#player-modal" data-profile="{{ $user->steamid64 }}">{{ $user->username }}</a>
                    </div>
                </td>
                <td><div class="player-games">{{ $user->games_played }}</div></td>
                <td><div class="player-wins">{{ $user->wins_count }}</div></td>
                <td><div class="player-win-rate">{{ $user->win_rate }}%</div></td>
                <td><div class="player-total-bank">~{{ round($user->top_value) }} <span><?php echo trans('options.currencyhead'); ?></span></div></td>
            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

@endsection