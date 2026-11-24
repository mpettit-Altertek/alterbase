<?php

/* __string_template__6c3665cee1286dd56a9ad363afb2cd97b5bc49821de283d6f0069b2c3974777a */
class __TwigTemplate_71d410e75f23b2b922cb3f14f96d5aef5b876b5d98b541624e50d9d5cae18b7f extends Twig_Template
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
        echo $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "data", array()), "child", array()), "name", array());
    }

    public function getTemplateName()
    {
        return "__string_template__6c3665cee1286dd56a9ad363afb2cd97b5bc49821de283d6f0069b2c3974777a";
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
/* {{item.data.child.name}}*/
