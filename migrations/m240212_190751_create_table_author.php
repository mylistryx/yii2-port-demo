<?php

use yii\db\Migration;

/**
 * Class m240212_190751_create_table_author
 */
class m240212_190751_create_table_author extends Migration
{
    private string $table = '{{%author}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id'            => $this->primaryKey(),
            'name'          => $this->string()->notNull()->comment('Имя'),
            'birthday'      => $this->date()->notNull()->comment('Дата рождения'),
            'biography'     => $this->text()->null()->comment('Биография'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
