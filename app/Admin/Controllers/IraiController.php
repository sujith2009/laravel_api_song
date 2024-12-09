<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Irai;

class IraiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    // protected $title = 'Irai';
    protected $title = 'song';


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Irai());

        $grid->column('id', __('Id'));
        $grid->column('category', __('Category'));
        $grid->column('song_title', __('Song title'));
        $grid->column('song_description', __('Song description'));
        $grid->column('song_audio', __('Song audio'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Irai::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category', __('Category'));
        $show->field('song_title', __('Song title'));
        $show->field('song_description', __('Song description'));
        $show->field('song_audio', __('Song audio'));
        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Irai());

        $form->text('category', __('Category'));
        $form->text('song_title', __('Song title'));
        $form->text('song_description', __('Song description'));
        $form->text('song_audio', __('Song audio'));

        return $form;
    }
}
