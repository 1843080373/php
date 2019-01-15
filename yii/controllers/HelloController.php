<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use yii\data\Pagination;
use app\models\Country;


class HelloController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function actionSay($message = 'Hello')
	{
		return $this->render('say', ['message' => $message]);
	}
	
	// ...�ִ�Ĵ���...
	
	public function actionEntry()
	{
		$model = new EntryForm;
		
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			// ��֤ $model �յ�������
			
			// ��Щ��������� ...
			
			return $this->render('entry-confirm', ['model' => $model]);
		} else {
			// �����ǳ�ʼ����ʾ����������֤����
			return $this->render('entry', ['model' => $model]);
		}
	}
	
	public function actionIndex()
	{
		$query = Country::find();
		
		$pagination = new Pagination([
				'defaultPageSize' => 5,
				'totalCount' => $query->count(),
		]);
		
		$countries = $query->orderBy('name')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
		
		return $this->render('index', [
				'countries' => $countries,
				'pagination' => $pagination,
		]);
	}
}
	 