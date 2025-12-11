<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./img/shalom.png">
    <link rel="stylesheet" href="./js/splide-4.1.3/dist/css/splide.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifólio - Shalom Santos</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark px-3 fixed-top top-0 w-100" style="z-index: 10;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Software developer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#scrollspyHeading1">Sobre mim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspyHeading2">Tecnologias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspyHeading3">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#scrollspyHeading4">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="scrollspy-example" tabindex="0" style="margin-top: 8.6vh;" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px 0px" data-bs-smooth-scroll="true">
        <div class="container" >
            <!-- APRESENTACAO -->
            <section class="apresentacao px-2 px-sm-3 px-md-4" id="scrollspyHeading1">
                <div class="row py-3 py-sm-5">
                    <div class="col-12 col-md-6">
                        <h5>I'm full-stack 😊</h5>
                        <h1 class="fw-bold default-color">Shalom Santos</h1>
                        <p class="fs-5">Acostumado a desenvolver soluções de software, seja na interface de usuário,
                            seja na mudança ou criação de regras de negócios para uma aplicação web.</p>
                        <i class="icon-res fa-solid fa-code"></i>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center mt-4 mt-sm-4 mt-md-0">
                        <img class="myphoto" src="./img/eu.jpg" alt="" width="400">
                    </div>
                </div>
            </section>

            <!-- SKILLS -->
            <section class="skills px-0 px-sm-0 px-md-4" id="scrollspyHeading2">
                <h1 class="fw-bold pt-3 default-color">Estou acostumado</h1>
                <hr>
                <?php
                    $skills = [
                        ['name' => 'SQL', 'icon' => 'fa-solid fa-database', 'cols' => 'col-lg-2'],
                        ['name' => 'PHP', 'icon' => 'fa-brands fa-php', 'cols' => 'col-lg-2'],
                        ['name' => 'Javascript', 'icon' => 'fa-brands fa-js', 'cols' => 'col-lg-2'],
                        ['name' => 'Laravel', 'icon' => 'fa-brands fa-laravel', 'cols' => ''],
                        ['name' => 'Css 3', 'icon' => 'fa-brands fa-css3-alt', 'cols' => ''],
                        ['name' => 'Bootstrap', 'icon' => 'fa-brands fa-bootstrap', 'cols' => ''],
                        ['name' => 'Vue.js', 'icon' => 'fa-brands fa-vuejs', 'cols' => ''],
                        ['name' => 'Docker', 'icon' => 'fa-brands fa-docker', 'cols' => 'col-lg-2'],
                    ];

                    $default_cols = 'col-6 col-sm-4 col-md-3 pb-3';
                ?>
                <div class="row py-3 py-sm-5">
                    <?php foreach ($skills as $skill) :
                    
                        $col_classes = $default_cols . (empty($skill['cols']) ? '' : ' ' . $skill['cols']);
                    ?>
                        <div class="<?= $col_classes ?>">
                            <div class="card shadow">
                                <i class="<?= $skill['icon'] ?> mx-auto my-3 fs-1"></i>
                                <div class="card-body text-center text-sm-start">
                                    <p class="fs-6 fw-bold"><?= htmlspecialchars($skill['name']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- REPOSITORIOS -->
            <section class="repositorios px-0 px-sm-0 px-md-4" id="scrollspyHeading3">
                <h1 class="fw-bold pt-3 default-color">Meus projetos</h1>
                <hr>

                <div class="splide" id="repos-splide" aria-label="Carrossel de Repositórios">
                    <div class="splide__track px-4">
                        <ul class="splide__list">
                            <?php
                            $username = 'shalomsantos';
                            $url = "https://api.github.com/users/{$username}/repos";
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_USERAGENT, 'Meu-Portifolio-App');
                            $response = curl_exec($ch);
                            curl_close($ch);
                            $repos = json_decode($response, true);
                            if (is_array($repos)) {
                                $repos = array_filter($repos, fn($repo) => !$repo['fork'] && $repo['private'] === false);
                                foreach ($repos as $repo) {
                                    $name = htmlspecialchars($repo['name']);
                                    $description = htmlspecialchars($repo['description'] ?? 'Repositório sem descrição.');
                                    $language = htmlspecialchars($repo['language'] ?? 'N/A');
                                    $url_github = htmlspecialchars($repo['html_url']);
                                    $icon_class = 'fa-solid fa-code';
                                    switch ($language) {
                                        case 'PHP':
                                            $icon_class = 'fa-brands fa-php';
                                            break;
                                        case 'JavaScript':
                                            $icon_class = 'fa-brands fa-square-js';
                                            break;
                                        case 'HTML':
                                            $icon_class = 'fa-brands fa-html5';
                                            break;
                                        case 'CSS':
                                            $icon_class = 'fa-brands fa-css3-alt';
                                            break;
                                        case 'Vue':
                                            $icon_class = 'fa-brands fa-vuejs';
                                            break;
                                    }
                            ?>

                                <li class="splide__slide">
                                    <div class="card h-100 shadow">
                                        <div class="card-body d-flex flex-column">
                                            <p class="fs-3 fw-bold">
                                                <?= $name ?>
                                            </p>
                                            <p class="card-text flex-grow-1">
                                                <?= $description ?>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-end pt-2 mt-auto">
                                                <i class="icon-res <?= $icon_class ?> fs-3" title="Linguagem: <?= $language ?>"></i>
                                                <a href="<?= $url_github ?>" target="_blank" class="card-link">
                                                    Ir para GitHub
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            <?php
                                }
                            } else {
                                echo '<p class="alert alert-warning">Não foi possível carregar os repositórios do GitHub.</p>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>

            </section>

            <!-- CONTATOS -->
            <section class="contatos px-0 px-sm-0 px-md-4" id="scrollspyHeading4">
                <h1 class="fw-bold pt-3 default-color">Fale comigo</h1>
                <hr>
                <div class="d-flex flex-column flex-sm-row gap-3 py-3">
                    <a href="https://github.com/shalomsantos">
                        <i class="icon-res fa-brands fa-github fs-1"></i>
                    </a>
                    <a href="https://www.instagram.com/shalomsantoss/">
                        <i class="icon-res fa-brands fa-instagram fs-1"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/shalom-santos-9891a11a6/">
                        <i class="icon-res fa-brands fa-linkedin fs-1"></i>
                    </a>
                </div>
            </section>
        </div>
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
        <div class="container">
            <span class="mb-3 mb-md-0 text-white"><i class="fa-solid fa-at"></i> 2024 Shalom pereira dos santos</span>
        </div>
    </footer>

    <script type="text/javascript" src="js\splide-4.1.3\dist\js\splide.min.js" defer></script>
    <script type="text/javascript" src="./js/vanilla-tilt.babel.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <script src="https://kit.fontawesome.com/c3cffe3b5e.js" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="./js/script.js" defer></script>
</body>

</html>