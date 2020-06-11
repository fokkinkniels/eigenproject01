<?php

Route::set('index.php', function(){
    Index::CreateView('Index');
});

Route::set('login', function(){
    Login::CreateView('Login');
});

Route::set('register', function(){
    Register::CreateView('Register');
});

Route::set('user-profile', function(){
    UserProfile::CreateView('UserProfile');
});

Route::set('account', function(){
    Account::CreateView('Account');
});

Route::set('update-profile', function(){
    UpdateProfile::CreateView('UpdateProfile');
});

Route::set('allgames', function(){
    AllGames::CreateView('AllGames');
});

Route::set('uploadGame', function(){
    UploadGame::CreateView('UploadGame');
});

Route::set('logout', function(){
    LogOut::CreateView('LogOut');
});

Route::set('admin-panel', function(){
    AdminPanel::CreateView('AdminPanel');
});

Route::set('changeAccAdmin', function(){
    ChangeAccAdmin::CreateView('ChangeAccAdmin');
});
?>
