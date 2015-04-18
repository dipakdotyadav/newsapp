<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $news_title
 * @property string $news_content
 * @property string $news_featured_image
 * @property string $news_created_date
 * @property integer $user_id
 * @property integer $published
 */
class News extends \yii\db\ActiveRecord
{
    public $featured_image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['news_title', 'news_content', 'news_featured_image', 'news_created_date', 'user_id', 'published'], 'required'],
            [['news_title', 'news_content'], 'required'],
            [['news_content'], 'string'],
            [['news_created_date'], 'safe'],
            [['user_id', 'published'], 'integer'],
            [['news_title'], 'string', 'max' => 150],
            //[['news_featured_image'], 'string', 'max' => 255],
            [['news_featured_image'], 'file', 'extensions'=>'jpg, gif, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_title' => 'Title',
            'news_content' => 'Content',
            'news_featured_image' => 'Featured Image',
            'news_created_date' => 'Created Date',
            'user_id' => 'User ID',
            'published' => 'Published',
        ];
    }
    
    /**
     * Save News
     *
     * @return true|false the saved model or false if saving fails
     */
    public function saveNews()
    {
        if ($this->validate()) {
            $news = new News();
            $news->news_title = $this->news_title;
            $news->news_content = $this->news_content;
            $news->news_featured_image = $this->news_featured_image;
            $news->news_created_date = date('Y-m-d H:i:s');
            $news->user_id = (Yii::$app->user->id) ? Yii::$app->user->id : 0;
            $news->published = 1;
            if ($news->save()) {
                return $news;
            }
        }

        return false;
    }
}
