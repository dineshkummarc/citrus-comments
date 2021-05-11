<?php
declare(strict_types=1);

namespace WebPage\Handler\Base;

/**
 * Class AbstractController
 * @package WebPage\Handler\Base
 */
abstract class AbstractController implements ControllerInterface
{
    protected $tplName;

    public function __construct(string $tplName = '')
    {
        $this->tplName = $tplName;
        $this->start();
        $data = $this->read();
        $this->stop($data);
    }

    public function start()
    {
//        echo '---reading ' . get_called_class()  . ' phpClass--- <br>';
    }

    public function stop(array $data)
    {
//        echo '---reading ' . '/view/index.html htmlFile' . '--- <br>';

        $this->render($data);

//        echo '--closing ./view/index.html' . '<br>';
//        echo '--closing ' . get_class() . '<br>';
    }

    /**
     * @param array $data
     */
    private function render(array $data)
    {
        if (file_exists(TEMPLATE_DIR . $this->tplName)) {
            include TEMPLATE_DIR . $this->tplName;
        } else {
            die('**Tpl for this file does not exist**. <br> --!File reading stopped!--.<br>--!App closed!--');
        }
    }

}
