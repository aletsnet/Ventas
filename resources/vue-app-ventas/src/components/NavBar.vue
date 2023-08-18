
<template>
    <nav class="navbar navbar-expand-lg bg-white border-bottom border-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/logo-nav-bar.png" alt="Bootstrap" width="42" height="42">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/">
                            <i class="bi bi-house-fill"></i>
                            Home
                        </router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-collection-fill"></i>
                            Tareas
                        </a>
                        <ul class="dropdown-menu">
                            <li><router-link class="dropdown-item" to="/catalogos">Catálogos</router-link></li>
                            <li><a class="dropdown-item" href="#">Catálogos Detalle</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Ventas</a></li>
                        </ul>
                    </li>
                </ul>
                <span class="navbar-text text-primary">
                    <i class="bi bi-person-circle"></i>
                    Kevin A. Demers
                </span>
            </div>
        </div>
    </nav>
</template>