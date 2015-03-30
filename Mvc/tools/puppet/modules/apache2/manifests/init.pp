class apache2 {

  package { "apache2":
    ensure => present
  }

  file { '/var/lock/apache2':
    ensure => 'absent',
    force => true,
    require => Package["apache2"]
  }

  file { '/var/www/Pattern':
    ensure => link,
    target => '/vagrant',
    mode   => 644,
    require => Package["apache2"]
  }

  file { '/etc/apache2/envvars':
    ensure => '/vagrant/tools/puppet/files/apache2/envvars',
    force => true,
    require => Package["apache2"]
   }

  file { '/etc/apache2/sites-available/default':
    owner  => root,
    group  => root,
    ensure => file,
    mode   => 644,
    source => '/vagrant/tools/puppet/files/apache2/default',
    require => Package["apache2"]
  }

  file { '/etc/apache2/sites-enabled/000-default':
    ensure => link,
    target => '/etc/apache2/sites-available/default',
    owner  => root,
    group  => root,
    mode   => 644,
    require => File['/etc/apache2/sites-available/default']
  }

  exec { 'enable apache2-module rewrite':
    command => '/usr/bin/sudo /usr/sbin/a2enmod rewrite',
    require => Package["apache2"]
  }

  exec { 'enable apache2-module php5':
    command => '/usr/bin/sudo /usr/sbin/a2enmod php5',
    require => Package["apache2"]
  }

  /**
   * Reload apache2 config and restart apache2
   */
  exec { 'Reload apache2 config and restart apache2':
    command => '/usr/bin/sudo /usr/sbin/service apache2 reload && /usr/bin/sudo /usr/sbin/service apache2 restart',
    require => Exec["enable apache2-module php5"]
  }

}
