$extlookup_datadir = "local"
$extlookup_precedence = ["data"]

node 'precise32' {
  include apt
  include vim
  include curl
  include git
  include php5
  include apache2
  include mysql_client
}