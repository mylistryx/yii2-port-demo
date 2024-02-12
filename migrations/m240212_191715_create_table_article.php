<?php

use yii\db\Migration;

/**
 * Class m240212_191715_create_table_article
 */
class m240212_191715_create_table_article extends Migration
{
    private string $table = '{{%author}}';
    private string $authorTable = '{{%author}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id'        => $this->primaryKey(),
            'title'     => $this->string()->notNull()->comment('Название'),
            'image'     => $this->string()->null()->comment('Изображение'),
            'announce'  => $this->text()->notNull()->comment('Анонс'),
            'content'   => $this->text()->null()->comment('Текст'),
            'author_id' => $this->integer()->notNull()->comment('ID автора'),
        ]);

        $this->addForeignKey('FK_Article_AuthorId__Author_Id', $this->table, ['author_id'], $this->authorTable, ['id'], 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_Article_AuthorId__Author_Id', $this->table);
        $this->dropTable($this->table);
    }
}
