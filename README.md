# Allo GUI audiophile web interface

This is the source code and pre-processed application repository for the [Allo.com](https://allo.com/) audiophile web interface, available in [DietPi OS](https://github.com/MichaIng/DietPi) for system and audio software management, and shipped with the [DietPi AlloGUI images](https://dietpi.com/phpbb/viewtopic.php?t=2317) for Raspberry Pi and Allo Sparky SBC.

This aims to replace the previous 7-Zip archive distribution from [dietpi.com](https://dietpi.com/downloads/binaries/all/) and enable easier development collaboration and transparency.

Compared to the latest previously provided v13.7, this version contains a major rework for performance and security reasons:
- The database is now generated on install, which contains only the login credentials, using the global software password.
- Cache and sessions are now stored via APCu, i.e. in memory instead of on disk.
- Shell commands are not executed via SSH and the dedicated `allo` user anymore, but directly via `exec()` as PHP user.
- Various related and unrelated fixes and cleanups have been applied, as well as updates for recent DietPi side changes.
- See [CHANGELOG.txt](https://github.com/MichaIng/DietPi-AlloGUI/blob/main/CHANGELOG.txt) for further details.
