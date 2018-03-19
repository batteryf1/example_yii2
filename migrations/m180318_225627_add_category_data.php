<?php

use yii\db\Migration;

/**
 * Class m180318_225627_add_category_data
 */
class m180318_225627_add_category_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Добавляем новые категории через миграцию
        Yii::$app->db->createCommand()->batchInsert('category', ['title', 'keyword', 'description'], [
            ['Австралия', 'Австралия', 'Австралия'],
            ['Австрия', 'Австрия', 'Австрия'],
            ['Азербайджан', 'Азербайджан', 'Азербайджан'],
            ['Албания', 'Албания', 'Албания'],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180318_225627_add_category_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180318_225627_add_category_data cannot be reverted.\n";

        return false;
    }
    */
}
