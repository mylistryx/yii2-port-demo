<?php

use yii\db\Migration;

/**
 * Class m240212_191653_create_table_category
 */
class m240212_191653_create_table_category extends Migration
{
    private string $table = '{{%category}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id'          => $this->primaryKey(),
            'parent_id'   => $this->integer()->null()->comment('Родительская категория'),
            'level'       => $this->integer()->notNull()->comment('Уровень'),
            'title'       => $this->string()->notNull()->comment('Наименование'),
            'description' => $this->text()->notNull()->comment('Описание'),
        ]);

        $this->addForeignKey('FK_Category_ParentId__Category_Id', $this->table, ['parent_id'], $this->table, ['id'], 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_Category_ParentId__Category_Id', $this->table);
        $this->dropTable($this->table);
    }
}
