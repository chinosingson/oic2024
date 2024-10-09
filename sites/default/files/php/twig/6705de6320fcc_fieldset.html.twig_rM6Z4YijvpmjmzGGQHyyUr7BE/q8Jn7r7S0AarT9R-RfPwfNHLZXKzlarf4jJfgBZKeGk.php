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

/* themes/custom/jango/templates/form/fieldset.html.twig */
class __TwigTemplate_ad15c565630151bcf27ed053dbb650cb extends \Twig\Template
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
        // line 24
        $context["classes"] = [0 => "js-form-item", 1 => "form-item", 2 => "js-form-wrapper", 3 => "form-wrapper", 4 => "form-group", 5 => "webform-container-inline"];
        // line 33
        echo "<fieldset";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 33), 33, $this->source), "html", null, true);
        echo ">
  ";
        // line 35
        $context["legend_span_classes"] = [0 => "fieldset-legend", 1 => ((        // line 37
($context["required"] ?? null)) ? ("js-form-required") : ("")), 2 => ((        // line 38
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 41
        echo "  ";
        // line 42
        echo "  <legend";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "attributes", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
        echo ">
    <span";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["legend_span"] ?? null), "attributes", [], "any", false, false, true, 43), "addClass", [0 => ($context["legend_span_classes"] ?? null)], "method", false, false, true, 43), 43, $this->source), "html", null, true);
        echo ">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
        echo "</span>
  </legend>
  <div class=\"fieldset-wrapper\">
    ";
        // line 46
        if (($context["errors"] ?? null)) {
            // line 47
            echo "      <div>
        ";
            // line 48
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 48, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 51
        echo "
    ";
        // line 52
        if ((((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 52)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#markup"] ?? null) : null) == "Checkbox") || ((($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 52)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#markup"] ?? null) : null) == "Radio Buttons"))) {
            // line 53
            echo "      <label>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
            echo "</label>
    ";
        }
        // line 55
        echo "
    ";
        // line 56
        if (($context["prefix"] ?? null)) {
            // line 57
            echo "      <span class=\"field-prefix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 57, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 59
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 59, $this->source), "html", null, true);
        echo "
    ";
        // line 60
        if (($context["suffix"] ?? null)) {
            // line 61
            echo "      <span class=\"field-suffix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 61, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 63
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 63)) {
            // line 64
            echo "      <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 64), "addClass", [0 => "description"], "method", false, false, true, 64), 64, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 64), 64, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 66
        echo "  </div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/form/fieldset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 66,  114 => 64,  111 => 63,  105 => 61,  103 => 60,  98 => 59,  92 => 57,  90 => 56,  87 => 55,  81 => 53,  79 => 52,  76 => 51,  70 => 48,  67 => 47,  65 => 46,  57 => 43,  52 => 42,  50 => 41,  48 => 38,  47 => 37,  46 => 35,  41 => 33,  39 => 24,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango/templates/form/fieldset.html.twig", "/app/web/themes/custom/jango/templates/form/fieldset.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 24, "if" => 46);
        static $filters = array("escape" => 33);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
