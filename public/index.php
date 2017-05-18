<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @date   2017-03-02
 */

use Phalcon\Mvc\Application;
use Phalcon\Mvc\View;

class ApiView extends View{

    public function displayJson( $status = 0 , $data = [], $message = ''){
        echo json_encode([
            'status'  => $status,
            'data'    => $data,
            'message' => $message,
        ]);
    }
}


try {
    /**
     * Read the configuration
     */
     $config = include __DIR__ . '/../apps/config/config.php';

    /**
     * Read auto-loader
     */
    include __DIR__ . '/../apps/config/loader.php';

    /**
     * Read services
     */
    include __DIR__ . '/../apps/config/services.php';

    $view = new View();

    /**
     * Handle the request
     */
    $application = new Application( $di );

    /**
     * set the view for the different module
     */
    $application->registerModules(
        [
            'main' => function ($di) use ($view) {
                $di->set(
                    'view',
                    function () use ($view) {
                        $view->setViewsDir(__DIR__ . '/../apps/views/');
                        $view->setRenderLevel(
                            View::LEVEL_ACTION_VIEW
                        );
                        return $view;
                    }
                );
            },
            'ajax' => function ($di) use ($view) {
                $di->set(
                    'view',
                    function () use ($view) {
                        return new ApiView();
                    }
                );
            }
        ]
    );
    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo $e->getMessage();
}
