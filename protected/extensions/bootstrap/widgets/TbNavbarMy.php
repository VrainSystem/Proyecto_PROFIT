<?php

/**
 * TbNavbar class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.7
 */
Yii::import('bootstrap.widgets.TbCollapse');
Yii::import('bootstrap.widgets.TbNavbar');

/**
 * Bootstrap navigation bar widget.
 */
class TbNavbarMy extends TbNavbar {

    /**
     * @var string the text for the nav text.
     * @since 0.9.8
     */
    public $navText;

    /**
     * @var string the text for the nav text class.
     * @since 0.9.8
     */
    public $navTextClass;
    
    public $navClass;

    /**
     * Initializes the widget.
     */
    public function init() {
        if ($this->brand !== false) {
            if (!isset($this->brand))
                $this->brand = CHtml::encode(Yii::app()->name);

            if (!isset($this->brandUrl))
                $this->brandUrl = Yii::app()->homeUrl;

            $this->brandOptions['href'] = CHtml::normalizeUrl($this->brandUrl);

            if (isset($this->brandOptions['class']))
                $this->brandOptions['class'] .= ' brand';
            else
                $this->brandOptions['class'] = 'brand';
        }

        $classes = array('navbar');

        if (isset($this->type) && in_array($this->type, array(self::TYPE_INVERSE)))
            $classes[] = 'navbar-' . $this->type;

        if ($this->fixed !== false && in_array($this->fixed, array(self::FIXED_TOP, self::FIXED_BOTTOM)))
            $classes[] = 'navbar-fixed-' . $this->fixed;

        if (!empty($classes)) {
            $classes = implode(' ', $classes);
            if (isset($this->htmlOptions['class']))
                $this->htmlOptions['class'] .= ' ' . $classes;
            else
                $this->htmlOptions['class'] = $classes;
        }
    }

    /**
     * Runs the widget.
     */
    public function run() {
        echo CHtml::openTag('div', $this->htmlOptions);
        echo '<div class="navbar-inner"><div class="' . $this->getContainerCssClass() . '">';

        $collapseId = TbCollapse::getNextContainerId();

        if ($this->collapse !== false) {
            echo '<a class="btn btn-navbar" data-toggle="collapse" data-target="#' . $collapseId . '">';
            echo '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
            echo '</a>';
        }

        if ($this->brand !== false) {
            if ($this->brandUrl !== false)
                echo CHtml::openTag('a', $this->brandOptions) . $this->brand . '</a>';
            else {
                unset($this->brandOptions['href']); // spans cannot have a href attribute
                echo CHtml::openTag('span', $this->brandOptions) . $this->brand . '</span>';
            }
        }
        if ($this->navText !== false) {
            echo CHtml::openTag('div', array('class' => 'navbar-text ' . $this->navTextClass)) . $this->navText . '</div>';
        }

        if ($this->collapse !== false) {
            $this->controller->beginWidget('bootstrap.widgets.TbCollapse', array(
                'id' => $collapseId,
                'toggle' => false, // navbars should be collapsed by default
                'htmlOptions' => array('class' => 'nav-collapse'),
            ));
        }

        foreach ($this->items as $item) {
            if (is_string($item))
                echo $item;
            else {
                if (isset($item['class'])) {
                    $className = $item['class'];
                    unset($item['class']);

                    $this->controller->widget($className, $item);
                }
            }
        }

        if ($this->collapse !== false)
            $this->controller->endWidget();

        echo '</div></div></div>';
    }

    /**
     * Returns the navbar container CSS class.
     * @return string the class
     */
    protected function getContainerCssClass() {
        return $this->fluid ? 'container-fluid' : 'container';
    }

}
