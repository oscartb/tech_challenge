CREATE DATABASE IF NOT EXISTS zinio_db;

DROP TABLE IF EXISTS `card`;
create table card
(
    id                 varchar(255)         not null
        primary key,
    name               varchar(255)         not null,
    damage             int                  not null,
    hp                 int                  not null,
    marked_for_removal tinyint(1) default 0 not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('0115fa7a-f4ca-4bbc-ac2d-8dcf7f08d938', 'R2D2 the grumpy', 6, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('01ca3d38-f090-462c-aacc-294b98b7dea3', 'Stephen the crazy', 7, 56, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('025dfca2-6dbd-4d5b-86b5-813c76eb094a', 'C3PO the capital', 10, 67, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('05ef615a-4a82-451c-9082-19368966f8ab', 'Stephen the embarrassed', 7, 80, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('066f1434-05a3-4778-a91c-a7954fa4edaa', 'Gimli the gregarious', 1, 95, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('06d6a80f-885b-4ad3-9697-b02955867923', 'C3PO the clear', 10, 79, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('07a9a488-71ca-46be-8b01-4e5a277babd4', 'Luigi the embellished', 9, 82, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('0e6682b6-ee03-4907-8376-8f6fb8fb3f50', 'Card super name2', 6, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('167dea3a-c418-4c82-83fb-fcba4cf7fa2f', 'Stephen the bouncy', 7, 56, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('233ac932-f5c4-486d-8580-8a0a81fc1f56', 'Obi the cheap', 9, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('2c3e0c90-f13d-49c9-a46b-60f08a0997f6', 'Sheldon the few', 6, 61, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('2e8e20af-e2db-4a63-b2e4-e13e7be42d0a', 'Obi the gentle', 7, 99, 1);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('3172ac00-85dd-4aa5-8dfe-4b6478913845', 'Sheldon the flickering', 4, 52, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('3acc814f-e38e-442f-a7a8-dcf4ed56a902', 'Stephen the creepy', 6, 97, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('3acf09be-0f64-4582-88a5-f70d4fdd9cac', 'Ann the full', 6, 86, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('3df335d8-3340-4e34-9854-3dc98da33152', 'Penny the exalted', 1, 52, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('3f67913c-3657-4ba1-9a86-98ec7f5daeaf', 'Sheldon the curly', 6, 57, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('422ac3eb-5bf9-4ce9-a53f-bf0635e6bd60', 'Card super name2', 6, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('44dcf626-ac4e-4f68-9037-ac2c9d8a9b2f', 'Gimli the gentle', 7, 63, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('49956eab-6e65-4358-8349-830781815052', 'R2D2 the fake', 5, 66, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('52ef905d-a49d-4f24-91f6-201c42a5622e', 'Charles the foolish', 9, 94, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('536897a9-2732-41b0-b6b7-799041065980', 'Luigi the eminent', 1, 62, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('54cb7fe6-76e4-4cb7-9ed5-ac6d68cbb1dc', 'Ulyses the embarrassed', 2, 69, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('5e0da658-d362-4be1-9f79-f715f6b5ffdb', 'Sherlock the flashy', 8, 71, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('5f98cbf7-cf11-43c2-b22d-ed77d85b2393', 'Card super name2', 6, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('62baa47e-cb86-4c34-b6be-f7cb557bc159', 'Penny the deficient', 7, 96, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('648c689c-ed58-49c4-a2d3-c4a8b1543c9f', 'Sheldon the grubby', 5, 55, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('68759594-ffd2-4c52-a561-e217bb360dd5', 'Gimli the different', 5, 85, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('6973eafc-94e5-446e-8bbd-39a0bdabc5e7', 'Ulyses the bland', 6, 63, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('86f7a94a-36e6-463f-9bcd-abe90398ec9f', 'Sheldon the grave', 2, 99, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('89800650-3d8f-4c90-98b1-7b9e2821a43f', 'Sheldon the equal', 4, 52, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('89a09715-00df-4bcd-af83-785b12b3a0f9', 'Card super name2', 6, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('8aa0a979-5413-4281-8953-ecd59c652ccd', 'Ann the glistening', 6, 75, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('90c0de0c-812f-4752-a802-001bda2fa94d', 'Obi the every', 3, 70, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('93fb8773-7c23-4adf-b7de-3f1795f6a5f0', 'R2D2 the best', 9, 87, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('9e76b4f8-47b5-4bec-9c3d-92e61b383985', 'Stephen the beloved', 1, 71, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('a0ec4288-ff66-4264-9e72-e18a302fe091', 'Sheldon the elaborate', 5, 100, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('a845043b-83ee-4498-b016-6ad93595104b', 'R2D2 the admired', 3, 98, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('ae6eeb4b-d626-41e7-86c0-f7412f460eeb', 'Sheldon the bogus', 7, 80, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('aff2d9bc-6260-4a9a-8e38-184d3485843c', 'Penny the everlasting', 8, 73, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('b01f2657-c634-4d58-813d-90f247a67df1', 'Gimli the cultivated', 3, 90, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('b263ede2-0f24-4022-a7b2-a53992cc4ff3', 'Card super name2', 6, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('bbd119f4-d699-4d82-bf3c-180cc9028016', 'Leonard the ajar', 10, 61, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('c4654a99-cd76-4fb8-8c6d-de81352a665c', 'Charles the bleak', 10, 75, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('d0b3f2c2-7322-4d1b-a857-11fa5876a8bd', 'Penny the evergreen', 4, 89, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('d2b16e1e-d88f-44ac-afe4-bbf3860d720c', 'Card super name2', 6, 101, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('d43afb2b-3180-4cb2-89c4-a531e4e9ae28', 'Sheldon the damp', 10, 73, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('dab718b0-6d83-4d5f-b709-869276dd87eb', 'Gimli the flickering', 3, 56, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('ddc0c2f0-29fe-4721-b140-ebfe3bb9ee93', 'Luigi the delectable', 7, 82, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('e00a8cef-d32c-4b65-bd61-b8c9f7229ac2', 'Gimli the essential', 2, 82, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('e05e62d5-4802-4ae0-98a9-417de4648fc3', 'Stephen the gorgeous', 10, 63, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('e13b4e4e-50a5-4669-aa7c-fbe772b74237', 'Obi the attentive', 7, 89, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('e84f8e59-52a2-4447-aef5-c1201f4591eb', 'Ann the authorized', 4, 91, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('efade503-198b-4b6c-ae48-8dd58a0c92e9', 'Sherlock the glum', 2, 55, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('f45fca49-5898-42c7-9d22-42edda613ac5', 'Sonic the focused', 2, 60, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('f93e353d-d44c-46ed-9b32-b78ec397a39e', 'R2D2 the dull', 10, 83, 0);
INSERT INTO zinio_db.card (id, name, damage, hp, marked_for_removal) VALUES ('fc0c3661-81ca-4458-8d08-ee15475aa370', 'R2D2 the fresh', 2, 91, 0);

DROP TABLE IF EXISTS `deck`;
create table deck
(
    id varchar(255) not null
        primary key
)
    collate = utf8mb4_unicode_ci;

INSERT INTO zinio_db.deck (id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd');
INSERT INTO zinio_db.deck (id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7');
INSERT INTO zinio_db.deck (id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace');

DROP TABLE IF EXISTS `deck_card`;
create table deck_card
(
    deck_id varchar(255) not null,
    card_id varchar(255) not null,
    primary key (deck_id, card_id),
    constraint FK_2AF3DCED111948DC
        foreign key (deck_id) references deck (id)
            on delete cascade,
    constraint FK_2AF3DCED4ACC9A20
        foreign key (card_id) references card (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index IDX_2AF3DCED111948DC
    on deck_card (deck_id);

create index IDX_2AF3DCED4ACC9A20
    on deck_card (card_id);

INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '0115fa7a-f4ca-4bbc-ac2d-8dcf7f08d938');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '05ef615a-4a82-451c-9082-19368966f8ab');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '066f1434-05a3-4778-a91c-a7954fa4edaa');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '06d6a80f-885b-4ad3-9697-b02955867923');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '3df335d8-3340-4e34-9854-3dc98da33152');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '3f67913c-3657-4ba1-9a86-98ec7f5daeaf');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '44dcf626-ac4e-4f68-9037-ac2c9d8a9b2f');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '54cb7fe6-76e4-4cb7-9ed5-ac6d68cbb1dc');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '5e0da658-d362-4be1-9f79-f715f6b5ffdb');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '90c0de0c-812f-4752-a802-001bda2fa94d');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', '93fb8773-7c23-4adf-b7de-3f1795f6a5f0');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'a0ec4288-ff66-4264-9e72-e18a302fe091');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'b263ede2-0f24-4022-a7b2-a53992cc4ff3');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'bbd119f4-d699-4d82-bf3c-180cc9028016');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'dab718b0-6d83-4d5f-b709-869276dd87eb');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'e00a8cef-d32c-4b65-bd61-b8c9f7229ac2');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'e05e62d5-4802-4ae0-98a9-417de4648fc3');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'efade503-198b-4b6c-ae48-8dd58a0c92e9');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'f93e353d-d44c-46ed-9b32-b78ec397a39e');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('62a13f8f-5af9-42dd-ab07-9438d9d4b0cd', 'fc0c3661-81ca-4458-8d08-ee15475aa370');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '01ca3d38-f090-462c-aacc-294b98b7dea3');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '07a9a488-71ca-46be-8b01-4e5a277babd4');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '0e6682b6-ee03-4907-8376-8f6fb8fb3f50');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '167dea3a-c418-4c82-83fb-fcba4cf7fa2f');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '44dcf626-ac4e-4f68-9037-ac2c9d8a9b2f');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '49956eab-6e65-4358-8349-830781815052');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '52ef905d-a49d-4f24-91f6-201c42a5622e');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '536897a9-2732-41b0-b6b7-799041065980');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '62baa47e-cb86-4c34-b6be-f7cb557bc159');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '68759594-ffd2-4c52-a561-e217bb360dd5');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', '9e76b4f8-47b5-4bec-9c3d-92e61b383985');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'a0ec4288-ff66-4264-9e72-e18a302fe091');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'b01f2657-c634-4d58-813d-90f247a67df1');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'bbd119f4-d699-4d82-bf3c-180cc9028016');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'c4654a99-cd76-4fb8-8c6d-de81352a665c');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'd0b3f2c2-7322-4d1b-a857-11fa5876a8bd');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'ddc0c2f0-29fe-4721-b140-ebfe3bb9ee93');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'e05e62d5-4802-4ae0-98a9-417de4648fc3');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'efade503-198b-4b6c-ae48-8dd58a0c92e9');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('8056370f-afbd-48ba-81d0-6fb5d67cfcf7', 'fc0c3661-81ca-4458-8d08-ee15475aa370');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '05ef615a-4a82-451c-9082-19368966f8ab');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '066f1434-05a3-4778-a91c-a7954fa4edaa');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '0e6682b6-ee03-4907-8376-8f6fb8fb3f50');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '167dea3a-c418-4c82-83fb-fcba4cf7fa2f');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '3172ac00-85dd-4aa5-8dfe-4b6478913845');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '3acc814f-e38e-442f-a7a8-dcf4ed56a902');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '3acf09be-0f64-4582-88a5-f70d4fdd9cac');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '3f67913c-3657-4ba1-9a86-98ec7f5daeaf');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '5e0da658-d362-4be1-9f79-f715f6b5ffdb');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '5f98cbf7-cf11-43c2-b22d-ed77d85b2393');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '62baa47e-cb86-4c34-b6be-f7cb557bc159');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '68759594-ffd2-4c52-a561-e217bb360dd5');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '86f7a94a-36e6-463f-9bcd-abe90398ec9f');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '89800650-3d8f-4c90-98b1-7b9e2821a43f');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', '9e76b4f8-47b5-4bec-9c3d-92e61b383985');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', 'b01f2657-c634-4d58-813d-90f247a67df1');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', 'bbd119f4-d699-4d82-bf3c-180cc9028016');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', 'c4654a99-cd76-4fb8-8c6d-de81352a665c');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', 'd2b16e1e-d88f-44ac-afe4-bbf3860d720c');
INSERT INTO zinio_db.deck_card (deck_id, card_id) VALUES ('b89356d1-92a1-4159-8990-7ec47c00cace', 'dab718b0-6d83-4d5f-b709-869276dd87eb');