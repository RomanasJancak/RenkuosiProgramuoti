<?php
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
 
Breadcrumbs::for(' ', function (BreadcrumbTrail $trail): void {
    $trail->push('Home', route('home'));
});
Breadcrumbs::for('home', function (BreadcrumbTrail $trail): void {
    $trail->push('Home', route('user.index'));
});
Breadcrumbs::for('login', function (BreadcrumbTrail $trail): void {
    $trail->push('Home', route('user.index'));
});
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail): void {
    $trail->push('List of users', route('user.index'));
});
Breadcrumbs::for('user.show', function (BreadcrumbTrail $trail,$user): void {
    $trail->parent('home');
    $trail->push('user', route('user.show', ['user' => $user]));
});
Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail,$user): void {
    $trail->parent('user.show',$user);
    $trail->push('edit', route('user.show', ['user' => $user]));
});
Breadcrumbs::for('budget.show', function (BreadcrumbTrail $trail,$budget,$user): void {
    $trail->parent('user.show',$user);
    $trail->push('Budget', route('budget.show', ['budget'=>$budget,'user' => $user]));
});
Breadcrumbs::for('budget.edit', function (BreadcrumbTrail $trail,$budget,$user): void {
    $trail->parent('budget.show',$budget,$user);
    $trail->push('Budget ['.$budget->name.']', route('budget.show', ['budget' => $budget,'user' => $user]));
});
Breadcrumbs::for('budget.create', function (BreadcrumbTrail $trail,$user): void {
    $trail->parent('user.show',$user);
    $trail->push('Budget creation', route('user.show', ['user' => $user]));
});
Breadcrumbs::for('budget.update', function (BreadcrumbTrail $trail,$budget,$user): void {
    $trail->parent('budget.edit',$budget,$user);
    $trail->push('', route('budget.show', ['budget' => $budget,'user' => $user]));
});
Breadcrumbs::for('apsipirkimas.create', function (BreadcrumbTrail $trail,$budget,$user): void {
    $trail->parent('budget.show',$budget,$user);
    $trail->push('Apsipirkimas creation', route('budget.show', ['budget'=>$budget,'user' => $user]));
});
Breadcrumbs::for('apsipirkimas.show', function (BreadcrumbTrail $trail,$apsipirkimas,$budget,$user): void {
    $trail->parent('budget.show',$budget,$user);
    $trail->push('apsipirkimas', route('apsipirkimas.show', ['apsipirkimas'=>$apsipirkimas,'budget' => $budget,'user' => $user]));
});