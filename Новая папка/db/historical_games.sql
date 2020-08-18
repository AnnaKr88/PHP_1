-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 16 2020 г., 13:23
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `historical_games`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_user` int NOT NULL,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `img` text COLLATE utf8mb4_general_ci NOT NULL,
  `genre` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `basketorder`
--

CREATE TABLE `basketorder` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `secondName` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `tel` text COLLATE utf8mb4_general_ci NOT NULL,
  `adress` text COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `pay` text COLLATE utf8mb4_general_ci NOT NULL,
  `product` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `basketorder`
--

INSERT INTO `basketorder` (`id`, `id_user`, `name`, `secondName`, `email`, `tel`, `adress`, `comment`, `pay`, `product`) VALUES
(45, 8, 'ann', 'ann', 'anna@anna', '123456', 'akjbvckajbvkajbd kajbvk akefhajbevkj', '', '0', '| Наименование: POE: Complete Edition Стоимость: 26 Количество: 1| Наименование: The Witcher: Wild Hunt Стоимость: 20 Количество: 1| Наименование: Cyberpunk 2077 Стоимость: 50 Количество: 1');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `short_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `full_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `img`, `short_info`, `full_info`, `genre`) VALUES
(1, 'Assassin`s Creed: Origins', '50', 'ACO.jpg', 'ASSASSIN’S CREED® ИСТОКИ - НОВОЕ НАЧАЛО', 'ASSASSIN’S CREED® ИСТОКИ - НОВОЕ НАЧАЛО\r\n<br><br>\r\nРаскройте тайны Древнего Египта и узнайте, как было создано Братство ассасинов.\r\n<br><br>\r\nНОВЫЕ ТЕРРИТОРИИ\r\nВоды Нила, таинственные пирамиды, дикие животные и беспощадные противники.\r\n<br><br>\r\nНОВЫЕ ИСТОРИИ\r\nМногочисленные задания, захватывающие истории и колоритные персонажи - от аристократов до нищих.\r\n<br><br>\r\nЭКШН-RPG\r\nНовая механика боя, разнообразное оружие, проработанная система прогресса и уникальные боссы.\r\n<br><br>\r\nВнутриигровые покупки не обязательны\r\n<br><br>\r\n1 игрок\r\nНе менее 50Гб\r\nDUALSHOCK®4 с функцией вибрации\r\nПоддерживается дистанционное воспроизведение\r\nPAL HD 720p,1080i,1080p\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\n© 2017 Ubisoft Entertainment. All Rights Reserved. Assassin’s Creed, Ubisoft, and the Ubisoft logo are trademarks of Ubisoft Entertainment in the U.S. and/or other countries.', 'Action'),
(2, 'Dragon Age: Inquisition', '20', 'DAI.jpg', 'Компьютерная ролевая игра, продолжение легендарной саги Dragon Age в жанре фэнтези.', 'Только вы можете помешать демонам заполонить Тедас. <br><br>\r\n\r\nКатаклизм погрузил земли Тедаса в хаос. Маги вступили в решительную борьбу против своих угнетателей-храмовников. Страны идут друг на друга войной. Именно вам предстоит, возглавив Инквизицию, восстановить порядок и дать отпор поборникам хаоса. Поход за истиной отразится на всех — старые союзы и договоренности будут забыты, им на смену придут новые...\r\n<br><br>\r\nДанный продукт поддерживает следующие языки Английский , Французский, Итальянский, Немецкий , Испанский, Польский, Русский.\r\n<br><br>\r\nВнутриигровые покупки не обязательны\r\n<br><br>\r\n1 игрок\r\nИнтернет: 2-4 игрока\r\nНе менее 45Мб\r\nкроссплатформенные функции\r\nPAL HD 720p,1080i,1080p\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Computer Entertainment Inc., эксклюзивно лицензированы Sony Computer Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\n© 2014 Electronic Arts Inc.', 'RPG'),
(3, 'DiRT Rally', '14', 'DR.jpg', 'Симулятор гонок.', 'DiRT Rally — самая реалистичная из ныне существующих гоночных игр. (Проверено игроками сообщества DiRT, прошедшими 80 милл. миль.) Почувствуйте напряжение пилота, который знает, как высока цена ошибки.<br><br>\r\nНа каждом этапе свои сложности, покрытие и погода. Все машины изнашиваются, но команда поможет вам не вылететь, хотя каждое ралли — марафонское испытание.\r\nDiRT Rally содержит лицензионный контент ЧМ по ралли-кроссу, а значит, и самые быстрые машины мира. Гоняйте в одиночном и многопольз. режимах.\r\n<br><br>\r\n\r\n1 игрок\r\nСетевая игра: 2-8 чел. Для доступа к онлайн мультиплееру в полной версии игры необходима подписка PlayStation®Plus\r\nНе менее 45Гб\r\nDUALSHOCK®4 с функцией вибрации\r\nPAL HD 720p,1080i,1080p\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\n© Codemasters Software Company Limited (\'Codemasters\'), 2016 г.. Все права защищены. Товарные знаки \'Codemasters\'®, \'Ego\'®, логотипы Codemasters, \'DiRT\'® и \'DiRT Rally\'® являются зарегистрированными товарными знаками Codemasters. \'RaceNet\'™ является зарегистрированным товарным знаком Codemasters. Все права защищены. Все прочие авторские права и товарные знаки принадлежат соответствующим владельцам и используются по лицензии. Разработано Codemasters. Распространяется компанией Koch Media GmbH, Gewerbegebiet 1, 6604 Höfen, Austria.', 'Sport'),
(4, 'Dishonored 2', '12', 'DIS2.jpg', 'Компьютерная игра в жанре стелс-экшен от первого лица с элементами RPG.', 'В игре Dishonored 2 вы снова окажетесь в роли ассасина со сверхъестественными способностями.\r\n<br><br>\r\nСайт IGN назвал эту игру «удивительной» и «идеальным продолжением», Eurogamer признал ее «шедевром», а Game Informer считает, что «эта история о мести – одна из лучших в своем жанре и проходить мимо нее ни в коем случае нельзя» Dishonored 2 – это продолжение знаменитого боевика Dishonored от Arkane Studios, завоевавшего более сотни наград «Игра года».\r\n<br><br>\r\nОкунитесь в удивительный мир Dishonored 2!\r\n<br><br>\r\n1 игрок\r\nDUALSHOCK®4 с функцией вибрации\r\nPAL HD 720p,1080i,1080p\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\nDishonored® 2 © 2016 ZeniMax Media Inc. Developed in association with Arkane Studios. Dishonored, Arkane, Bethesda, Bethesda Softworks, ZeniMax and related logos are registered trademarks or trademarks of ZeniMax Media Inc. in the U.S. and/or other countries. All Rights Reserved.', 'Action'),
(5, 'God of War', '15', 'GOF.jpg', 'Видео-игра от третьего лица, жанра «Action-adventure».', 'Выбравшись из тени богов, Кратос обязан приспособиться к жизни в незнакомых землях с их неожиданными опасностями, а еще стать хорошим отцом. Вместе со своим сыном Атреем он отправится в очень личное путешествие по суровым скандинавским пустошам, где им вдвоем предстоит сражаться с разнообразным злом.<br>\r\n• Отправляйтесь в мрачное царство стихий, где обитают грозные существа и беспощадные боги, сошедшие со страниц скандинавской мифологии.<br>\r\n• Побеждайте врагов в неистовых ближних схватках.<br>\r\n• Проникнитесь трогательной историей отца и сына.<br>\r\n<br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\nGod of War™ ©2018 Sony Interactive Entertainment LLC. Published by Sony Interactive Entertainment Europe Limited. Developed by SIE Santa Monica Studio. “God of War” is a trademark or a registered trademark of Sony Interactive Entertainment Europe. All rights reserved.', 'Action'),
(6, 'The Witcher: Wild Hunt', '20', 'WWH.jpg', '\'Ведьмак 3\' - фэнтези-RPG с нелинейным сюжетом, зависящим от решений игрока.', 'Сыграйте за убийцу чудовищ, разыщите дитя из пророчества, загляните в огромные города, покорите горные перевалы...\r\n<br><br>\r\nУбийца чудовищ\r\nСпециально обученные ведьмаки - единственные, кто может дать отпор монстрам, которыми полнится этот мир.\r\n<br><br>\r\nФэнтези без \'тьмы\' и \'света\'\r\nОткрытый мир приключений задает новые стандарты игровой вселенной.\r\n<br><br>\r\nДевушка из пророчества\r\nВас ждет самый важный заказ: найдите дитя Предназначения, которое спасет или уничтожит весь мир.\r\n<br><br>\r\n1 игрок\r\nНе менее 35Гб\r\nDUALSHOCK®4 с функцией вибрации\r\nПоддерживается дистанционное воспроизведение\r\nPAL HD 720p,1080i,1080p\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\nThe Witcher® is a trademark of CD PROJEKT S.A. The Witcher game © CD PROJEKT S.A. All rights reserved. The Witcher game is based on a novel by Andrzej Sapkowski. All other copyrights and trademarks are the property of their respective owners.', 'RPG'),
(7, 'POE: Complete Edition', '26', 'POEC.jpg', 'Партийная компьютерная игра в жанре RPG.', 'Благодаря новой системе управления и адаптированным для телеэкранов окнам меню игроки смогут с легкостью перемещаться по экранам создания персонажей, управления отрядом и участвовать в битвах. \r\n<br><br>\r\n• Признанное качество диалогов, сюжета и визуальной составляющей Pillars of Eternity, включая контент из дополнений The White March (части I и II)<br>\r\n• Бесчисленные возможности выбора при создании персонажей – от расы и класса до биографии<br>\r\n• Огромная вселенная, где вы встретите множество уникальных спутников и фракций с любовью созданный мир, по которому можно путешествовать часами<br>\r\n• Все основные обновления для РС-версии, включая повышенный лимит уровня персонажей, дополнительные настройки ИИ отряда и новые уровни сложности<br>\r\n• Новые, разработанные с нуля интерфейс и система управления<br><br>\r\n\r\n1 игрок\r\nНе менее 18Гб\r\nDUALSHOCK®4 с функцией вибрации\r\nPAL HD 720p,1080p\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\nPILLARS OF ETERNITY © 2015-2017 Dark Rock Industries Ltd. Developed by Obsidian Entertainment Inc. Published by Paradox Interactive AB. Pillars of Eternity and the Pillars of Eternity logo are registered trademarks of Dark Rock Industries Ltd. All other trademarks, logos and copyrights are property of their respective owners. All rights reserved.', 'RPG'),
(9, 'Cyberpunk 2077', '50', 'CB.jpg', 'Приключенческая ролевая игра, действие которой происходит в мегаполисе Найт-Сити', 'Cyberpunk 2077 — приключенческая ролевая игра, действие которой происходит в мегаполисе Найт-Сити, где власть, роскошь и модификации тела ценятся выше всего. Вы играете за V, наёмника в поисках устройства, позволяющего обрести бессмертие. Вы сможете менять киберимпланты, навыки и стиль игры своего персонажа, исследуя открытый мир, где ваши поступки влияют на ход сюжета и всё, что вас окружает.\r\n<br><br>\r\nИГРАЙТЕ ЗА ГОРОДСКОГО НАЁМНИКА\r\nСтаньте киберпанком — оснащённым имплантами наёмником — и сделайте себе имя на улицах Найт-Сити.\r\n<br><br>\r\nЖИВИТЕ В ГОРОДЕ БУДУЩЕГО\r\nИсследуйте огромный мир Найт-Сити, который выглядит ярче, сложнее и глубже всего, что вы видели раньше.\r\n<br><br>\r\nИЩИТЕ ИМПЛАНТ, ДАЮЩИЙ ВЕЧНУЮ ЖИЗНЬ\r\nВозьмитесь за самое опасное задание в своей жизни и найдите прототип импланта, позволяющего обрести бессмертие.\r\n<br><br>\r\nПодробнее о предварительном заказе, в том числе и о его отмене, можно узнать из Условий обслуживания и Лицензионного соглашения Sony Entertainment Network. Автоматическая загрузка осуществляется, если на системе PS4™ включены настройки «Автоматический вход в систему» и «Автоматический вход в сеть».\r\n<br><br>\r\n1 PLAYER\r\n80GB MINIMUM\r\nDUALSHOCK®4 VIBRATION FUNCTION\r\nHD VIDEO OUTPUT 1080P\r\nREMOTE PLAY SUPPORTED\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\nCD PROJEKT®, Cyberpunk®, Cyberpunk 2077® являются зарегистрированным товарными знаками CD PROJEKT S.A. © CD PROJEKT S.A. Все права сохранены. ', 'RPG'),
(10, 'EA SPORTS™ UFC®', '13', 'UFC.jpg', 'Качественный симулятор боёв без правил, проводимых под эгидой UFC.', 'В этой серии EA Sports есть более новая игра. Сыграйте в новейшую игру и оцените все нововведения.\r\n<br><br>\r\nВЛЕЙСЯ В БОЙ\r\nНовое поколение игр в жанре файтинг от создателей знаменитой серии Fight Night. Step into the Octagon® с EA SPORTS™ UFC® - ваш соперник по-настоящему почувствует все удары, болевые приемы и тейкдауны.\r\n<br><br>\r\n1-2 игрока\r\nИнтернет: 2-2 игрока\r\nDUALSHOCK®4 с функцией вибрации\r\nPAL HD 720p,1080i,1080p\r\n<br><br>\r\nЗагрузка осуществляется в соответствии с Условиями обслуживания PlayStation Network, Условиями использования программ и любыми другими применимыми дополнительными документами. Если вы не согласны выполнять условия, не загружайте материалы. Дополнительная информация приведена в Условиях обслуживания.<br>\r\nРазовая лицензионная плата за право загрузки на несколько систем PS4. Вход в PlayStation Network не требуется при использовании на вашей основной системе PS4, но необходим при использовании на других системах PS4.<br>\r\nПеред использованием продукта ознакомьтесь с «Мерами предосторожности», важными для вашего здоровья.<br>\r\nБиблиотечные программы ©Sony Interactive Entertainment Inc., эксклюзивно лицензированы Sony Interactive Entertainment Europe. Действуют Условия использования программ. Полный текст Условий использования см. на сайте ru.playstation.com/legal.\r\n<br><br>\r\n© Electronic Arts Inc, 2014. EA, EA SPORTS и логотип EA SPORTS являются товарными знаками Electronic Arts Inc. Ultimate Fighting Championship®, Ultimate Fighting®, UFC®, The Ultimate Fighter®, Octagon Girls®, Submission®, As Real As It Gets®, Zuffa®,The Octagon™, восьмиугольный мат и дизайн клетки являются зарегистрированными товарными знаками, товарными знаками, фирменным стилем или знаками обслуживания Zuffa, LLC и филиалов в США и в других странах или территориях. Все другие знаки, упомянутые в игре, могут являться собственностью Zuffa, LLC или других соответствующих владельцев. Любое использование защищенных авторским правом программ, товарных знаков, фирменного стиля и прочих объектов интеллектуальной собственности компании Zuffa, LLC строго запрещено без предварительно полученного письменного согласия от компании Zuffa. Настоящим в явной форме все права защищены.\r\n', 'Sport');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `login` text COLLATE utf8mb4_general_ci NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `login`, `name`, `email`, `tel`, `text`) VALUES
(13, 'Ann', 'Anna', 'ann@ann', 123456, 'Что-то написано.'),
(14, 'Alex', 'Лёха', 'alex@alex', 987456321, 'Тоже что-то написал.');

-- --------------------------------------------------------

--
-- Структура таблицы `userbasket`
--

CREATE TABLE `userbasket` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_user` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `userbasket`
--

INSERT INTO `userbasket` (`id`, `id_product`, `id_user`, `title`, `img`, `genre`, `price`, `count`) VALUES
(28, 7, 8, 'POE: Complete Edition', 'POEC.jpg', 'RPG', '26', 1),
(29, 6, 8, 'The Witcher: Wild Hunt', 'WWH.jpg', 'RPG', '20', 1),
(30, 9, 8, 'Cyberpunk 2077', 'CB.jpg', 'RPG', '50', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text COLLATE utf8mb4_general_ci NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `pass` text COLLATE utf8mb4_general_ci NOT NULL,
  `rights` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `email`, `pass`, `rights`) VALUES
(1, 'Admin', 'Ann', 'admin@anna.ru', '21232f297a57a5a743894a0e4a801fc3', 0),
(9, 'Ann', 'Ann Ann', 'ann@ann', 'e10adc3949ba59abbe56e057f20f883e', 1),
(21, 'Alex', 'Alex', 'alex@alex', '5583413443164b56500def9a533c7c70', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basketorder`
--
ALTER TABLE `basketorder`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `userbasket`
--
ALTER TABLE `userbasket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT для таблицы `basketorder`
--
ALTER TABLE `basketorder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `userbasket`
--
ALTER TABLE `userbasket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
