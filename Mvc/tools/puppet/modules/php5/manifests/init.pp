class php5 {

  /**
   * Install PHP5 and Modules
   */
  package { "php5":
    ensure => present
  }

  package { "php5-common":
    ensure => present,
    require => Package["php5"]
  }

  package { 'xdebug':
    name => 'php5-xdebug',
    ensure => present,
    require => Package['php5']
  }

  package { "php5-cli":
    ensure => present,
    require => Package["php5"]
  }

  package { "php5-intl":
    ensure => present,
    require => Package["php5"]
  }

  package { "php-pear":
    ensure => present,
    require => Package["php5"]
  }

  package { "libapache2-mod-php5":
    ensure => present,
    require => Package["php5"]
  }

  package { "php5-mysql":
    ensure => present,
    require => Package["php5"]
  }

  package { "php5-gd":
    ensure => present,
    require => Package["php5"]
  }

  package { "php5-curl":
    ensure => present,
    require => Package["php5"]
  }

  /**
   * Set php.ini
   */
  file { '/etc/php5/apache2/php.ini':
    owner   => root,
    group   => root,
    ensure  => file,
    mode    => 644,
    force   => true,
    source  => '/vagrant/tools/puppet/files/php5/apache2.php.ini',
    require => Package["php5"]
  }

  /**
   * Install PEAR Modules
   */
  exec { "pear 1.1: upgrade pear":
    command => "/usr/bin/sudo /usr/bin/pear upgrade pear",
    require => Package["php-pear"]
  }

  exec { "pear 1.2: enable auto discover":
    command => "/usr/bin/sudo /usr/bin/pear config-set auto_discover 1; true",
    require => Exec["pear 1.1: upgrade pear"]
  }

  exec { "pear 1.3: update channels":
    command => "/usr/bin/sudo /usr/bin/pear -q update-channels; true",
    require => Exec["pear 1.2: enable auto discover"]
  }

  exec { "pear 1.4: upgrade pear after channel update":
    command => "/usr/bin/sudo /usr/bin/pear -q upgrade pear; true",
    require => Exec["pear 1.3: update channels"]
  }

  # PHPUnit
  exec { "pear 2.1: discover channel phpnuit":
    command => "/usr/bin/sudo /usr/bin/pear -q channel-discover pear.phpunit.de; true",
    require => Exec["pear 1.4: upgrade pear after channel update"]
  }

  exec { "pear 2.2: install phpnuit":
    command => "/usr/bin/sudo /usr/bin/pear -q install --alldeps phpunit/PHPUnit; true",
    require => Exec["pear 2.1: discover channel phpnuit"]
  }

  exec { "pear 2.3: install phpunit mock object":
    command => "/usr/bin/sudo /usr/bin/pear -q install pear.phpunit.de/PHPUnit_MockObject; true",
    require => Exec["pear 2.2: install phpnuit"]
  }

  # EZ Components
  exec { "pear 3: install ez components":
      command => "/usr/bin/sudo /usr/bin/pear -q channel-discover components.ez.no; true",
      require => Exec["pear 2.3: install phpunit mock object"]
  }

}