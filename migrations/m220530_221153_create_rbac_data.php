<?php

use yii\db\Migration;

/**
 * Class m220530_221153_create_rbac_data
 */
class m220530_221153_create_rbac_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $auth = Yii::$app->authManager;

        //
        $viewUserPermission = $auth->createPermission('viewUser');
        $auth->add($viewUserPermission);
        $deleteUserPermission = $auth->createPermission('deleteUser');
        $auth->add($deleteUserPermission);
        $updateUserPermission = $auth->createPermission('updateUser');
        $auth->add($updateUserPermission);

        //
        $moderatorRole = $auth->createRole('moderator');
        $auth->add($moderatorRole);

        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);

        //
        $auth->addChild($moderatorRole, $viewUserPermission);

        $auth->addChild($adminRole, $moderatorRole);
        $auth->addChild($adminRole, $deleteUserPermission);
        $auth->addChild($adminRole, $updateUserPermission);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220530_221153_create_rbac_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220530_221153_create_rbac_data cannot be reverted.\n";

        return false;
    }
    */
}
