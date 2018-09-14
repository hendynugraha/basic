<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/
		
		$events = Event::find()->all();
		$tasks = [];
		
		foreach ($events as $eve)
		{
			  $event = new \yii2fullcalendar\models\Event();
			  $event->id = $eve->id;
			  $event->backgroundColor = 'green';
			  $event->title = $eve->title;
			  $event->start = $eve->created_date;
			  $tasks[] = $event;
		}

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'events' => $tasks,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        $model = new Event();
		$model->created_date = $date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }else{
			return $this->renderAjax('create', [
            'model' => $model,
			]);
		}
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else { 
			return $this->renderAjax('update', [
            'model' => $model,
        ]);
		}
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	
	/**
 * 
 * @param type $choice
 * @return type
 */
	public function actionFilterEvents($choice = null) {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$query = Event::find();

		if( is_null($choice) || $choice=='all'){
			$dbEvents = $query->all();
			$events = $this->loadEvents($dbEvents);
		} else{
			$dbEvents = $query->where(['=', 'column_name', ':choice'])
					->params([':choice' => $choice])
					->asArray()
					->all();
			$events = $this->loadEvents($dbEvents);
		}
		return $events;
	}

	/**
	 * 
	 * @param type $dbEvents
	 * @return \yii2fullcalendar\models\Event
	 */
	private function loadEvents($dbEvents) {
		foreach( $dbEvents AS $event ){
			$Event = new \yii2fullcalendar\models\Event();
			$Event->id = $event->id;
			$Event->title = $event->categoryAsString;
			$Event->description = $event->description;
			$Event->start = date('Y-m-d\TH:i:s\Z', strtotime($event->created_date . ' ' . $event->created_date));
			$Event->end = date('Y-m-d\TH:i:s\Z', strtotime($event->time_out . ' ' . $event->time_out));
			$Event->status = $event->status;
			$Event->remarks = $event->remarks;
			$events[] = $Event;
		}
		return $events;
	}
}
