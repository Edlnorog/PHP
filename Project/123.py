
def create_directory(directory_name):
    """
    Create a new directory with the given name.
    
    Parameters:
    directory_name (str): The name of the new directory.
    
    Returns:
    str: A message indicating the success or failure of the directory creation.
    """
    try:
        os.mkdir(directory_name)
        return f"Directory '{directory_name}' created successfully."
    except FileExistsError:
        return f"Directory '{directory_name}' already exists."
    except Exception as e:
        return f"An error occurred while creating the directory: {str(e)}"
    