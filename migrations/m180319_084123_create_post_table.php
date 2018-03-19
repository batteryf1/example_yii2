<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180319_084123_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'content' => $this->text(),
            'author_id' => $this->integer(),
            'status' => $this->integer(),
            'category_id' => $this->integer(),
            'keyword' => $this->string(),
        ]);


        // add foreign key for table `user`
        $this->addForeignKey(
            'FK_post_category',
            'post',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );


        // add foreign key for table `user`
        $this->addForeignKey(
            'FK_post_author',
            'post',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }
}
