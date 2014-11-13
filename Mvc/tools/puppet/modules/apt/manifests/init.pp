class apt {

  # Ensure apt-get update has been run before installing any packages
  Exec["initial apt-get update"] -> Package <| |>

  exec { "initial apt-get update":
    command => "/usr/bin/apt-get update"
  }

}