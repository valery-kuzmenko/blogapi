<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response,
	Symfony\Component\HttpFoundation\Request,
	FOS\RestBundle\Controller\FOSRestController,
	FOS\RestBundle\Controller\Annotations\Route;

class TranslateController extends MainController {
  /**
   * @Route("/translate.json")
   */
  public function translateAction(Request $request) {
	$lang = $request->query->get('lang');
	$arrTranslates = array();
	$arrTranslates['en'] = array(
		'layout.main.header' => 'The Single Page Blogger',
		'layout.main.header1' => 'One step blogging solution',
		'layout.main.header2' => 'Public Site',
		'layout.main.header3' => 'Admin panel',
		'layout.main.footer' => 'The Single Page Blogger',
		'views.posts.author' => 'By',
		'directive.comments.title' => 'Comments',
		'directive.comments.name' => 'Name',
		'directive.comments.comment' => 'Comment',
		'form.submit' => 'Submit',
		'form.name' => 'Enter Your Name',
		'form.email' => 'Enter Your Email',
		'form.password' => 'Enter Your Password',
		'form.error.empty' => 'This field is required.',
		'pagination.next' => 'Next',
		'pagination.last' => 'Last',
		'pagination.first' => 'First',
		'pagination.prev' => 'Prev',
		'admin.allposts' => 'View all posts',
		'admin.addpost' => 'Add Post',
		'admin.delete' => 'Delete',
		'admin.edit' => 'Edit',	
		'admin.create' => 'Create',	
		'admin.update' => 'Update',	
		'admin.creating...' => 'Creating...',	
		'admin.updating...' => 'Updating...',	
		'admin.addpost.posttitle' => 'Post Title',	
		'admin.addpost.content' => 'Content',	
		'admin.addpost.tags' => 'Tags',	
		'admin.addpost.keywords' => 'Keywords',
		'public.registration.success' => 'Congratulations! You have successful registered!',
		'public.registration.error' => 'Your data is incorrect!',
		
	);

	$arrTranslates['ru'] = array(
		'layout.main.header' => 'SPA Блог',
		'layout.main.header1' => '1 шаг',
		'layout.main.header2' => 'Публичный сайт',
		'layout.main.header3' => 'Админка',
		'layout.main.footer' => 'SPA Блоггер',
		'views.posts.author' => 'Автор',
		'directive.comments.title' => 'Комментарии',
		'directive.comments.name' => 'Имя',
		'directive.comments.comment' => 'Комментарий',
		'form.submit' => 'Отправить',
		'form.name' => 'Имя',
		'form.email' => 'Email',
		'form.password' => 'Пароль',
		'form.error.empty' => 'Поле обязательно для заполнения',
		'pagination.next' => 'След.',
		'pagination.last' => 'Посл.',
		'pagination.first' => 'Перв.',
		'pagination.prev' => 'Пред.',
		'admin.allposts' => 'Все посты',
		'admin.addpost' => 'Добавить новый',
		'admin.delete' => 'Удалить',
		'admin.edit' => 'Изменить',
		'admin.create' => 'Создать',	
		'admin.update' => 'Обновить',	
		'admin.creating...' => 'Создание...',	
		'admin.updating...' => 'Обновление...',		
		'admin.addpost.posttitle' => 'Заголовок',	
		'admin.addpost.content' => 'Котент',	
		'admin.addpost.tags' => 'Тэги',	
		'admin.addpost.keywords' => 'Ключевы слова',	
		'public.registration.success' => 'Вы успешно зарегистрированы!',
		'public.registration.error' => 'Данные введены неверно!',
	);
	
	return $arrTranslates[$lang];
  }
}