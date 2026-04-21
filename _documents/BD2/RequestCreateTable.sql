/* Create Table */

-- create table article_campagne
create table article_campagne
(
    id           bigint unsigned auto_increment
        primary key,
    article_id   bigint unsigned             not null,
    campagne_id  bigint unsigned             not null,
    image        varchar(255) default 'null' null,
    couleur      bigint unsigned             not null,
    taille       bigint unsigned             not null,
    quantite_max int          default 5      not null,
    prix         double                      null,
    created_at   timestamp                   null,
    updated_at   timestamp                   null,
    constraint article_campagne_article_id_foreign
        foreign key (article_id) references articles (id),
    constraint article_campagne_campagne_id_foreign
        foreign key (campagne_id) references campagnes (id),
    constraint article_campagne_couleur_foreign
        foreign key (couleur) references couleurs (id)
            on delete cascade,
    constraint article_campagne_taille_foreign
        foreign key (taille) references tailles (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;
-- create table article_campagne_commande
create table article_campagne_commande
(
    id                  bigint unsigned auto_increment
        primary key,
    commande_id         bigint unsigned                 not null,
    article_campagne_id bigint unsigned                 not null,
    quantite            int          default 0          not null,
    montant_total       double       default 0          not null,
    statut              varchar(255) default 'Non payé' not null,
    created_at          timestamp                       null,
    updated_at          timestamp                       null,
    constraint article_campagne_commande_article_campagne_id_foreign
        foreign key (article_campagne_id) references article_campagne (id),
    constraint article_campagne_commande_commande_id_foreign
        foreign key (commande_id) references commandes (id)
)
    collate = utf8mb4_unicode_ci;

-- create table articles
create table articles
(
    id          bigint unsigned auto_increment
        primary key,
    nom         varchar(255) not null,
    type        varchar(255) not null,
    description varchar(255) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

-- create table campagne_usager_modifier
create table campagne_usager_modifier
(
    usager_id   bigint unsigned not null,
    campagne_id bigint unsigned not null,
    created_at  timestamp       null,
    updated_at  timestamp       null,
    primary key (usager_id, campagne_id),
    constraint campagne_usager_modifier_campagne_id_foreign
        foreign key (campagne_id) references campagnes (id),
    constraint campagne_usager_modifier_usager_id_foreign
        foreign key (usager_id) references usagers (id)
)
    collate = utf8mb4_unicode_ci;
-- Create table campagnes
create table campagnes
(
    id                         bigint unsigned auto_increment
        primary key,
    nom_campagne               varchar(255)                              not null,
    date_debut_campagne        date                                      not null,
    date_fin_campagne          date                                      not null,
    date_debut_collecte        date                                      not null,
    date_fin_collecte          date                                      not null,
    administrateur_id_creation bigint unsigned                           not null,
    progression                varchar(255) default 'intention d''achat' not null,
    statut                     varchar(255) default 'en cours'           not null,
    created_at                 timestamp                                 null,
    updated_at                 timestamp                                 null,
    constraint campagnes_nom_campagne_unique
        unique (nom_campagne),
    constraint campagnes_administrateur_id_creation_foreign
        foreign key (administrateur_id_creation) references usagers (id)
)
    collate = utf8mb4_unicode_ci;
-- create table commandes
create table commandes
(
    id            bigint unsigned auto_increment
        primary key,
    date_commande date            not null,
    usager_id     bigint unsigned not null,
    created_at    timestamp       null,
    updated_at    timestamp       null,
    constraint commandes_usager_id_foreign
        foreign key (usager_id) references usagers (id)
)
    collate = utf8mb4_unicode_ci;
-- create table couleurs
create table couleurs
(
    id           bigint unsigned auto_increment
        primary key,
    nom_couleur  varchar(255) not null,
    code_couleur varchar(255) not null,
    created_at   timestamp    null,
    updated_at   timestamp    null,
    constraint couleurs_code_couleur_unique
        unique (code_couleur),
    constraint couleurs_nom_couleur_unique
        unique (nom_couleur)
)
    collate = utf8mb4_unicode_ci;

-- create table tailles
create table tailles
(
    id         bigint unsigned auto_increment
        primary key,
    format     varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

-- create table usagers
create table usagers
(
    id             bigint unsigned auto_increment
        primary key,
    nom            varchar(255)                  not null,
    prenom         varchar(255)                  not null,
    password       varchar(255)                  not null,
    email          varchar(255)                  not null,
    no_telephone   varchar(255)                  null,
    type           varchar(255) default 'client' not null,
    remember_token varchar(100)                  null,
    created_at     timestamp                     null,
    updated_at     timestamp                     null,
    constraint usagers_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;





