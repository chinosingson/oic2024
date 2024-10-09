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

/* themes/custom/jango_sub/templates/nodes/node--slideshow.html.twig */
class __TwigTemplate_373ce4cade2f1fa861037a9d4eccfffa63acf3faa6edae5de4bd0d5e17a6614c extends \Twig\Template
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
        // line 76
        echo "<div class=\"hero-video-block\">
  <video id=\"hero-video\" poster=\"";
        // line 77
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_field_value\Twig\Extension\FieldValueExtension']->getFieldValue($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_slidshow_image", [], "any", false, false, true, 77), 77, $this->source)), "html", null, true);
        echo "\" autoplay muted loop playsinline disablepictureinpicture >
    ";
        // line 78
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "get", [0 => "field_slideshow_video_url"], "method", false, false, true, 78), "isEmpty", [], "method", false, false, true, 78)) {
            // line 79
            echo "    <source src=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_field_value\Twig\Extension\FieldValueExtension']->getFieldValue($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_slideshow_video_url", [], "any", false, false, true, 79), 79, $this->source)), "html", null, true);
            echo "\" type=\"video/mp4\">
    ";
        }
        // line 81
        echo "  </video>  
  
  <div class=\"hero-copy text-white\">
    <div class=\"container\">";
        // line 85
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_field_value\Twig\Extension\FieldValueExtension']->getFieldValue($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 85), 85, $this->source)), "html", null, true);
        // line 87
        echo "<div class=\"cta-buttons\">
        <a href=\"";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_0 = (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_slideshow_cta", [], "any", false, false, true, 88)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#url"] ?? null) : null), 88, $this->source), "html", null, true);
        echo "\" class=\"btn c-btn-uppercase btn-md c-btn-sbold c-btn-square c-theme-btn\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_2 = (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_slideshow_cta", [], "any", false, false, true, 88)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["#title"] ?? null) : null), 88, $this->source), "html", null, true);
        echo "</a>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango_sub/templates/nodes/node--slideshow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 88,  61 => 87,  59 => 85,  54 => 81,  48 => 79,  46 => 78,  42 => 77,  39 => 76,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango_sub/templates/nodes/node--slideshow.html.twig", "/app/web/themes/custom/jango_sub/templates/nodes/node--slideshow.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 78);
        static $filters = array("escape" => 77, "field_value" => 77);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'field_value'],
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
