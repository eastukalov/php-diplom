<?php

/* main_admin.twig */
class __TwigTemplate_5e6ac566ecb54d65d8ecb9cbc74a8b26c28ca9d94923f026939bce986ae0234b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- Выше 3 Мета-теги ** должны прийти в первую очередь в голове; любой другой руководитель контент *после* эти теги -->
    <title>Администрирование</title>

    <!-- Bootstrap -->
    <link href=\"../vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"../css/datatables.min.css\"/>



    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- Предупреждение: Respond.js не работает при просмотре страницы через файл:// -->
    <!--[if lt IE 9]>
<!--    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script >-->
    <!--<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>-->
    <![endif]-->
</head>
<body>

<div class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
        </div>
        <div class=\"navbar-collapse collapse text-center\">
            <div style=\"display: inline-block;\">
                <ul class=\"nav navbar-nav\">
                    <li
                        ";
        // line 39
        if (((isset($context["tab"]) ? $context["tab"] : null) == 1)) {
            // line 40
            echo "                            class=\"active\"
                        ";
        }
        // line 42
        echo "                    ><a href=\"../controllers/admins.php\">Администраторы</a></li>
                    <li
                        ";
        // line 44
        if (((isset($context["tab"]) ? $context["tab"] : null) == 2)) {
            // line 45
            echo "                            class=\"active\"
                        ";
        }
        // line 47
        echo "                    ><a href=\"../controllers/categories.php\">Темы</a></li>
                    <li
                        ";
        // line 49
        if (((isset($context["tab"]) ? $context["tab"] : null) == 3)) {
            // line 50
            echo "                            class=\"active\"
                        ";
        }
        // line 52
        echo "                    ><a href=\"../controllers/questions.php\">Вопросы</a></li>
                    <li><a href=\"../controllers/main.php\">На страницу</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

";
        // line 60
        $this->displayBlock('content', $context, $blocks);
        // line 62
        echo "</body>
</html>

";
    }

    // line 60
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "main_admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 60,  98 => 62,  96 => 60,  86 => 52,  82 => 50,  80 => 49,  76 => 47,  72 => 45,  70 => 44,  66 => 42,  62 => 40,  60 => 39,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "main_admin.twig", "C:\\OSPanel\\domains\\php\\diplom\\templates\\main_admin.twig");
    }
}
