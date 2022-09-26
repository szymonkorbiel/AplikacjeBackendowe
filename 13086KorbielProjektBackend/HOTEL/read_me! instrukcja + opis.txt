Projekt HOTEL

Aplikacja jest serwisem internetowym służącym odwiedzającemu do rezerwowania pokoi hotelowych.

Użytkownik może się zalogować po czym zarezerwować pokój, sprawdzić rezerwację, oraz ją usunąć.

Aby uruchomić projekt należy pobrać aplikację xampp control panel oraz uruchomić na niej serwery Apache (UI) oraz MySql (baza danych).
Następnie folder z projektem należy umieścić w folderze htdocs znajdującym się w folderze głównym programu xampp.

Następnie w celu importu bazy danych należy wpisać w przeglądarkę localhost/phpmyadmin i tam poprzez zakładkę import wybrać plik rezerwacje.sql i zaimportować bazę.

Następnie należy uruchomić przeglądarkę oraz wpisać na pasku localhost/HOTEL.
(HOTEL lub nazwę folderu w którym bezpośrednio znajdują się pliki ze stroną).
Ukaże się nam strona główna hotelu gdzie jest kilka zdjęć opis oraz na górze przycisk do logowania.

Po kliknięciu przyciskiu zostajemy przeniesieni na stronę logowania tam wpisujemy nasze dane lub można kolejnym odnośnikiem przenieść się na stronę rejestracji gdzie możemy się zarejestrować.

Po udanej rejestracji należy się zalogować (zostaniemy na te podstronę przeniesieni automatycznie).

Po udanym logowaniu ukazuje się strona użytkownika z wypisanym loginem i odnośnikami do sprawdzenia rezerwacji, dokonania rezerwacji, zresetowania hasła oraz wylogowania z konta.

Po kliknięciu rezerwuj wyświetla się nam formularz dokonania rezerwacji gdzie wybieramy jaki chcemy pokój.

Jest też formularz z poleceniem usunięcia rezerwacji.

Możemy też sprawdzić rezerwacje poprzez zakładkę sprawdź rezerwacje.

Ostatnim jest przycisk wyloguj z konta który kończy sesję oraz przenosi uzytkownika na strone glowna.

Jeżeli admin chce zobaczyć czy dane rzeczywiście zapisują się do bazy może wpisać w przeglądarkę localhost/phpmyadmin i tam wybrać bazę hotel i sprawdzić poszczególne tabele.