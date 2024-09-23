# Path to save the captured image
$imagePath = "captured_image.jpg"

# Add required .NET assembly for image processing
Add-Type -AssemblyName System.Drawing

# Define the size of the screenshot (full screen)
$screen = [System.Drawing.Graphics]::FromHwnd([IntPtr]::Zero)
$screenSize = $screen.VisibleClipBounds
$width = [int]$screenSize.Width
$height = [int]$screenSize.Height

# Create a new bitmap object with the screen size
$bitmap = New-Object System.Drawing.Bitmap -ArgumentList $width, $height

# Create graphics object to capture the screen
$graphics = [System.Drawing.Graphics]::FromImage($bitmap)
$graphics.CopyFromScreen([System.Drawing.Point]::Empty, [System.Drawing.Point]::Empty, $bitmap.Size)

# Save the bitmap to a file
$bitmap.Save($imagePath, [System.Drawing.Imaging.ImageFormat]::Jpeg)

# Clean up
$graphics.Dispose()
$bitmap.Dispose()
$screen.Dispose()
