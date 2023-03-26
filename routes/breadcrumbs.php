<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Officer
Breadcrumbs::for('officer', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Daftar Petugas', route('admin.officer.index'));
});

// Officer > Create
Breadcrumbs::for('officer.create', function (BreadcrumbTrail $trail) {
    $trail->parent('officer');
    $trail->push('Tambah Petugas', route('admin.officer.create'));
});

// Officer > Show
Breadcrumbs::for('officer.show', function (BreadcrumbTrail $trail, $officer) {
    $trail->parent('officer');
    $trail->push($officer->name, route('admin.officer.show', $officer));
});

// Officer > Edit
Breadcrumbs::for('officer.edit', function (BreadcrumbTrail $trail, $officer) {
    $trail->parent('officer');
    $trail->push($officer->name, route('admin.officer.show', $officer));
    $trail->push('Edit', route('admin.officer.edit', $officer));
});
