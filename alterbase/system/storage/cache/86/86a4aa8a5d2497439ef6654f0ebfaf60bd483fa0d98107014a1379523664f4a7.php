<?php

/* __string_template__7fcf4639a3893285d7bf12d987115a3922c3cd334dccec481bc146ff86a1059f */
class __TwigTemplate_3c45fdb68621a8571274c4e8d0ff7c0600ae1aeb1b36fd4e83ef40e5ec782be2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name", array());
    }

    public function getTemplateName()
    {
        return "__string_template__7fcf4639a3893285d7bf12d987115a3922c3cd334dccec481bc146ff86a1059f";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {{item.name}}*/
