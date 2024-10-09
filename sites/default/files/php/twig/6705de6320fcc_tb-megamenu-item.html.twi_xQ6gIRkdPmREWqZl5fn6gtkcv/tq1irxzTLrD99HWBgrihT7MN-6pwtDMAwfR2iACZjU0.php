<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/jango_sub/templates/shortcodes/tb-megamenu-item.html.twig */
class __TwigTemplate_74f3a279e3a2ce747c05e24e30dce9ff extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $context["local_class"] = (((is_string($__internal_compile_0 = (($__internal_compile_2 = ($context["link"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["url"] ?? null) : null)) && is_string($__internal_compile_1 = "#") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1)))) ? (" c-onepage-link") : (""));
        // line 2
        echo "
";
        // line 3
        $context["toggle_class"] = ((($context["submenu"] ?? null)) ? ("c-toggler") : (""));
        // line 4
        echo "
";
        // line 5
        if ((($__internal_compile_3 = ($context["item_config"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["caption"] ?? null) : null)) {
            // line 6
            echo "  <li class=\"mega-caption\"><h3>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_4 = ($context["item_config"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["caption"] ?? null) : null), 6, $this->source), "html", null, true);
            echo "</h3></li>
";
        }
        // line 8
        echo "
<li ";
        // line 9
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => [0 => ($context["local_class"] ?? null), 1 => ($context["trail_class"] ?? null)]], "method", false, false, true, 9), 9, $this->source), "html", null, true);
        echo " >
  <a href=\"";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_5 = ($context["link"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["url"] ?? null) : null), 10, $this->source), "html", null, true);
        echo "\" ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_compile_6 = ($context["link"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["attributes"] ?? null) : null), "addClass", [0 => ($context["depth_class"] ?? null), 1 => ($context["toggle_class"] ?? null)], "method", false, false, true, 10), 10, $this->source), "html", null, true);
        echo ">
    ";
        // line 11
        if ((($__internal_compile_7 = ($context["item_config"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["xicon"] ?? null) : null)) {
            // line 12
            echo "      <i class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_8 = ($context["item_config"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["xicon"] ?? null) : null), 12, $this->source), "html", null, true);
            echo "\"></i>
    ";
        }
        // line 14
        echo "
    ";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["link"] ?? null), "title_translate", [], "any", false, false, true, 15), 15, $this->source)));
        echo "

    ";
        // line 17
        if ((($context["submenu"] ?? null) && (($__internal_compile_9 = ($context["block_config"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["auto-arrow"] ?? null) : null))) {
            // line 18
            echo "      <span class=\"caret\"></span>
    ";
        }
        // line 20
        echo "  </a>
  ";
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["submenu"] ?? null), 21, $this->source), "html", null, true);
        echo "
</li>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango_sub/templates/shortcodes/tb-megamenu-item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 21,  92 => 20,  88 => 18,  86 => 17,  81 => 15,  78 => 14,  72 => 12,  70 => 11,  64 => 10,  60 => 9,  57 => 8,  51 => 6,  49 => 5,  46 => 4,  44 => 3,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango_sub/templates/shortcodes/tb-megamenu-item.html.twig", "/app/web/themes/custom/jango_sub/templates/shortcodes/tb-megamenu-item.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 5);
        static $filters = array("escape" => 6, "t" => 15);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
