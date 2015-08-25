<?php

class LoanController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'PinjamBuku', 'notapproved', 'batal', 'sudahdenda', 'belumdenda', 'pesananku'),
                'users' => array('@'),
            ),
            /* array('allow', // allow authenticated user to perform 'create' and 'update' actions
              'actions' => array('create', 'update', 'PinjamBuku','notapproved', 'batal', 'sudahdenda', 'belumdenda'),
              'users' => array('@'),
              ),*/
              array('allow', // allow admin user to perform 'admin' and 'delete' actions
              'actions' => array('admin', 'delete', 'approve','return_book', 'sudahdenda', 'belumdenda'),
              'users' => array('admin'),
              ), 
            array('deny', // deny all users
            //'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Loan;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Loan'])) {
            $model->attributes = $_POST['Loan'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Loan'])) {
            $model->attributes = $_POST['Loan'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
//    public function actionDelete($id) {
//        $this->loadModel($id)->delete();
//
//        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//        if (!isset($_GET['ajax']))
//            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Loan');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Loan('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Loan']))
            $model->attributes = $_GET['Loan'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionPinjamBuku($book_id) {
        $member = Member::model()->findByAttributes(array('account_id' => Yii::app()->user->id));
        $dataProvider = new CActiveDataProvider('Loan', array(
            'criteria' => array(
                'select' => array(
                    '`t`.*'
                ),
                'condition' => '`c`.`book_id`=' . $book_id . ' AND `t`.`return_date` IS NULL AND `t`.`borrower_id` =' . $member->id,
                //'condition'=>'return_date IS NULL',
                'join' => 'JOIN `copies` AS `c` ON `c`.`id`=`t`.`copy_id`',
            )
        ));
        $book = Book::model()->findByPk($book_id);
        echo($dataProvider->totalItemCount);
        /* echo($dataProvider->id);
          echo "<pre>";
          var_dump($dataProvider); */


        if ($dataProvider->totalItemCount) {
            if ($book) {
                $this->render('gagal', array('model' => $book));
            } else {
                throw new CHttpException(
                404, 'Buku tidak tersedia'
                );
            }
        } else {
            $copy = Copy::model()->findByAttributes(array('book_id' => $book_id, 'availability' => 1));
            if ($copy) {
                $id = $copy->id;
                $member = Member::model()->findByAttributes(array('account_id' => Yii::app()->user->id));

                if ($member->book_count < 3) {
                    $loan = new Loan;
                    $loan->copy_id = $id;
                    $loan->borrower_id = $member->id;
                    $loan->start_date = date("0000-00-00");
                    if ($loan->save()) {
                        $this->render('sukses', array('model' => $book));
                    }
                }
            } else {
                if ($book) {
                    $this->render('gagalgagal', array('model' => $book));
                } else {
                    throw new CHttpException(
                    404, 'Buku tidak tersedia'
                    );
                }
            }
        }
    }

    public function actionBatal($id) {
        $member = Member::model()->findByAttributes(array('account_id' => Yii::app()->user->id));
        $loan = Loan::model()->findByAttributes(array('borrower_id' => $member->id, 'id' => $id));
        if ($loan) {
            if ($loan->delete()) {
                $this->redirect(array('loan/pesananku'));
            }
        } else {
            throw new CHttpException(
                    404, 'Ini bukan buku pesanan Anda'
                    );
        }
    }

    public function actionNotApproved() {
        $member = Member::model()->findByAttributes(array('account_id' => Yii::app()->user->id));

        $dataProvider = new CActiveDataProvider('Loan', array(
            'criteria' => array(
                'select' => array(
                    '`t`.*'
                ),
                'condition' => 'borrower_id=' . $member->id . ' && approval = ' . 0,
            )
        ));
        $this->render('index', array('dataProvider' => $dataProvider));
    }
    
    public function actionPesananku() {
        $member = Member::model()->findByAttributes(array('account_id' => Yii::app()->user->id));
        
        $dataProvider = new CActiveDataProvider('Loan', array(
            'criteria' => array(
                'select' => array(
                    '`t`.*'
                ),
                'condition' => 'borrower_id=' . $member->id . ' && return_book = ' . 0,
            )
        ));
        $this->render('index', array('dataProvider' => $dataProvider));
        
    }

    public function actionBelumDenda() {
        $criteria = new CDbCriteria();
        $criteria->addCondition(array('where' => '((DATEDIFF(CURDATE(), t.due_date))<=0)'));
        $dataProvider = new CActiveDataProvider('Loan', array(
            'criteria' => $criteria
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionSudahDenda() {
        $criteria = new CDbCriteria();
        $criteria->addCondition(array('where' => '((DATEDIFF(CURDATE(), t.due_date))>0)'));
        $dataProvider = new CActiveDataProvider('Loan', array(
            'criteria' => $criteria
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    public function actionApprove($id)
        {   
            $model = Loan::model()->findByPk($id);
            $model-> approval =1;
            if ($model-> approval){
                $member = new Member();
                $member = Member::model()->findByAttributes(array ('id'=>$model->borrower_id));
                $member ->book_count=$member->book_count+1;
                $member->save();
                
                $copybook= new Copy();
                $copybook= Copy::model()->findByAttributes(array ('id'=>$model->copy_id));
                $copybook-> availability=0;
                $copybook->save();
                
                $model->start_date= date("Y-m-d");
                $date = new DateTime($model->start_date);
                $interval = new DateInterval("P1W");
                $duedate = new DateTime;
                $duedate = date_add($date,$interval);
                $model->due_date= $duedate->format("Y-m-d");
            }
                
                if($model->save()){
                    $this->redirect(array('view','id'=>$model->id));
            }
        }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Loan the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Loan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Loan $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'loan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    } 
    
    public function actionReturn_Book($id)
        {   
            $model = Loan::model()->findByPk($id);
            if ($model-> approval == 1){
            $model-> return_book =1;
            
            if ($model-> return_book){
                $member = new Member();
                $member = Member::model()->findByAttributes(array ('id'=>$model->borrower_id));
                $member ->book_count=$member->book_count - 1;
                $member->save();
                
                $copybook= new Copy();
                $copybook= Copy::model()->findByAttributes(array ('id'=>$model->copy_id));
                $copybook-> availability = 1;
                $copybook->save();
                
                $model->return_date= date("Y-m-d");
                               
            }
                
                if($model->save()){
                    $this->redirect(array('view','id'=>$model->id));
              
            }}       
            else{
            throw new CHttpException(
            404,'You are not approve this book yet.'
            );                
            }
        }

}
