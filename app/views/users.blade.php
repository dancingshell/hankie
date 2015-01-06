@foreach ($users as $user)
    you are baller, {{link_to_action('UserController@showProfile', $user->name, $parameters = array($user->id), $attributes = array($user->id));}}<br />
@endforeach
