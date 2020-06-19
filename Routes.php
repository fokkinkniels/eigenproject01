<?php

Route::set('index.php', function(){
    index::CreateView('index');
});

Route::set('login', function(){
    Login::CreateView('login');
});

Route::set('register', function(){
    Register::CreateView('register');
});

Route::set('user-profile', function(){
    UserProfile::CreateView('userProfile');
});

Route::set('account', function(){
    Account::CreateView('account');
});

Route::set('update-profile', function(){
    UpdateProfile::CreateView('updateProfile');
});

Route::set('allgames', function(){
    AllGames::CreateView('allGames');
});

Route::set('uploadGame', function(){
    UploadGame::CreateView('uploadGame');
});

Route::set('logout', function(){
    LogOut::CreateView('logOut');
});

Route::set('admin-panel', function(){
    AdminPanel::CreateView('adminPanel');
});

Route::set('changeAccAdmin', function(){
    ChangeAccAdmin::CreateView('changeAccAdmin');
});

Route::set('game', function(){
    Game::CreateView('game');
});

Route::set('mygames', function(){
    MyGames::CreateView('mygames');
});

?>
