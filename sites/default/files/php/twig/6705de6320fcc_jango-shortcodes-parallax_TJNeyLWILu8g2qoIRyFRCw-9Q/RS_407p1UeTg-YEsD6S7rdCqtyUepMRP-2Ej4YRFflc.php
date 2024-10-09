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

/* themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-parallax-block-diagonal.html.twig */
class __TwigTemplate_9a2696f380b40e2f26fbc52f34ea1ada extends \Twig\Template
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
        echo "<div class=\"c-content-feature-4\">
  <div class=\"c-bg-parallax c-feature-bg c-content-";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image"] ?? null), 2, $this->source), "html", null, true);
        echo " c-diagonal c-border-";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 2, $this->source), "html", null, true);
        echo "-";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["bg_color"] ?? null), 2, $this->source), "html", null, true);
        echo "\"
       style=\"background-image: url(";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 3, $this->source), "html", null, true);
        echo ");\"></div>
  <div class=\"c-content-area c-content-";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 4, $this->source), "html", null, true);
        echo "\"></div>
  <div class=\"container\">
    <div class=\"c-feature-content c-";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 6, $this->source), "html", null, true);
        echo "\">
      <div class=\"c-content-v-center\">
        <div class=\"c-wrapper\">
          <div class=\"c-body\">
            ";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 10, $this->source));
        echo "
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-parallax-block-diagonal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 10,  59 => 6,  54 => 4,  50 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-parallax-block-diagonal.html.twig", "/app/web/themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-parallax-block-diagonal.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 2, "raw" => 10);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 'raw'],
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
